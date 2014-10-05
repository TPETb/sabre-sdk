<?php
namespace Sabre\Cryptography\RSA;

use DateTime;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Table;
use PDO;
use Sabre\Cryptography\RSA\Exceptions\CurrentKeyUnknownException;
use Sabre\Cryptography\RSA\Exceptions\DatabaseConnectionUnknownException;
use Sabre\Cryptography\RSA\Exceptions\ExpirationDateInPastException;
use Sabre\Cryptography\RSA\Exceptions\KeyNotFoundException;

class RsaKeyManager
{
    const DEFAULT_TABLE_NAME = 'sirena_rsa_key';
    const TABLE_ALIAS = 'srk';

    const FIELD_ID          = 'id';
    const FIELD_STATUS      = 'status';
    const FIELD_PUBLIC_KEY  = 'public_key';
    const FIELD_PRIVATE_KEY = 'private_key';
    const FIELD_EXPIRATION  = 'expiration';
    const FIELD_DIGEST      = 'digest';

    protected static $FIELDS = [
        self::FIELD_ID,
        self::FIELD_STATUS,
        self::FIELD_PUBLIC_KEY,
        self::FIELD_PRIVATE_KEY,
        self::FIELD_EXPIRATION,
        self::FIELD_DIGEST,
    ];

    const DATETIME_FORMAT = 'Y-m-d H:i:s';

    const TABLE_STATUS_UNKNOWN = __LINE__;
    const TABLE_STATUS_READY   = __LINE__;

    /** @var Connection */
    protected $connection;

    /** @var string */
    protected $tableName;

    /** @var self::TABLE_STATUS_* */
    protected $tableStatus = self::TABLE_STATUS_UNKNOWN;

    public function __construct(Connection $connection, $tableName = self::DEFAULT_TABLE_NAME)
    {
        $this->connection = $connection;
        $this->tableName = $tableName;
    }

    // public : key management //

    /**
     * Generates key pair, stores it to db, and returns.
     *
     *  @return RsaKeyEntity
    **/
    public function generate()
    {
        $keyPair = (new RsaCryptography())->generateKeys();

        $this->initTable();
        $this->connection->insert($this->getTableName(), [
            self::FIELD_STATUS      => RsaKeyStatus::UNSENT,
            self::FIELD_PUBLIC_KEY  => $keyPair->getPublicKey(),
            self::FIELD_PRIVATE_KEY => $keyPair->getPrivateKey(),
        ]);

        $id = $this->connection->lastInsertId();

        return $this->getById($id);
    }

    /**
     * Mark the key as sent to gateway and store the digest returned in response.
     *
     *  @param  integer     $id         Key identifier as returned by RsaKeyEntity->getId method.
     *  @param  string      $digest     SHA-1 digest as returned by Sirena iclient_pub_key or key_info responses.
     *  @return RsaKeyEntity
     *  @throws KeyNotFoundException if a key with given id is not stored in the database.
    **/
    public function storeDigest($id, $digest)
    {
        // Check whether a key with given id exists.
        if (! $this->getById($id)) {
            throw (new KeyNotFoundException('Key with id="' . $id . '" is unknown'))
                ->setKeyId($id);
        }

        // Enable the new key.
        $this->initTable();
        $this->connection->update($this->getTableName(), [
            self::FIELD_STATUS => RsaKeyStatus::UNCONFIRMED,
            self::FIELD_DIGEST => $digest,
        ], [
            self::FIELD_ID => $id,
        ]);

        return $this->getById($id);
    }

    /**
     * Mark the key identified by id as a future key.
     *
     *  @return RsaKeyEntity
     *  @throws KeyNotFoundException if a key with given id is not stored in the database.
    **/
    public function confirm($id)
    {
        // Check whether a key with given id exists.
        if (! $this->getById($id)) {
            throw (new KeyNotFoundException('Key with id="' . $id . '" is unknown'))
                ->setKeyId($id);
        }

        // Enable the new key.
        $this->initTable();
        $this->connection->update($this->getTableName(), [
            self::FIELD_STATUS => RsaKeyStatus::FUTURE,
        ], [
            self::FIELD_ID => $id,
        ]);

        return $this->getById($id);
    }

    /**
     * Marks the key with given id as current, previously disabling the current key.
     *
     *  @param  integer     $id         Key identifier as returned by generateKey and getCurrentKey methods.
     *  @param  DateTime    $expiration Expiration date as returned by Sirena key_info response.
     *  @return RsaKeyEntity
     *  @throws ExpirationDateInPastException(expiration) if expiration date is already expired.
     *  @throws KeyNotFoundException if a key with given id is not stored in the database.
    **/
    public function enable($id, DateTime $expiration)
    {
        // Check expiration date.
        if ($expiration < (new DateTime())) {
            throw (new ExpirationDateInPastException(
                'Expiration date "' . $expiration->format(self::DATETIME_FORMAT) . '" is in past. Must be future date.'
            ))->setExpirationDate($expiration);
        }

        // Check whether a key with given id exists.
        if (! $this->getById($id)) {
            throw (new KeyNotFoundException('Key with id="' . $id . '" is unknown'))
                ->setKeyId($id);
        }

        // Switch keys within an transaction.
        $this->initTable();
        $this->connection->transactional(function ($connection) use ($id, $expiration) {

            // Disable the current key.
            $connection->update($this->getTableName(), [
                self::FIELD_STATUS => RsaKeyStatus::EXPIRED,
            ], [
                self::FIELD_STATUS => RsaKeyStatus::CURRENT,
            ]);

            // Enable the new key.
            $connection->update($this->getTableName(), [
                self::FIELD_STATUS      => RsaKeyStatus::CURRENT,
                self::FIELD_EXPIRATION  => $expiration->format(self::DATETIME_FORMAT),
            ], [
                self::FIELD_ID => $id,
            ]);
        });

        return $this->getById($id);
    }

    public function expire($id)
    {
        $this->initTable();
        $this->connection->update($this->getTableName(), [
            self::FIELD_STATUS => RsaKeyStatus::EXPIRED,
        ], [
            self::FIELD_ID => $id,
        ]);

        return $this->getById($id);
    }

    // public : key retrieval //

    /**
     * Retrieves current key from storage if there is one.
     *
     *  @throws CurrentKeyUnknownException if the storage doesn't hold current key.
     *  @return RsaKeyEntity
    **/
    public function getCurrent()
    {
        $currentId = $this->getCurrentId();
        if (false === $currentId) {
            throw new CurrentKeyUnknownException('No key is stored as current');
        }

        return $this->getById($currentId);
    }

    public function getCurrentId()
    {
        return $this->getOneIdByStatus(RsaKeyStatus::CURRENT);
    }

    public function getFutureId()
    {
        return $this->getOneIdByStatus(RsaKeyStatus::FUTURE);
    }

    public function getOneIdByStatus($status)
    {
        $this->initTable();

        $qb = $this->createQueryBuilder([self::FIELD_ID]);
        $qb ->where($qb->expr()->eq(
            self::TABLE_ALIAS . '.' . self::FIELD_STATUS,
            $qb->createNamedParameter($status)
        ))
            ->setMaxResults(1);
        return $qb->execute()->fetchColumn();
    }

    public function getByDigest($digest)
    {
        $this->initTable();

        $qb = $this->createQueryBuilder(self::$FIELDS);
        $qb ->where($qb->expr()->eq(
            self::TABLE_ALIAS . '.' . self::FIELD_DIGEST,
            $qb->createNamedParameter($digest)
        ))
            ->setMaxResults(1);

        $result = $qb->execute()->fetch(PDO::FETCH_ASSOC);

        if (! $result) {
            return null;
        }

        return $this->createEntity($result);
    }

    /**
     * Return key entity if an entry with given id is present in the storage.
     *
     * Return null otherwise.
     *
     *  @param  integer $id
     *  @return RsaKeyEntity?
    **/
    public function getById($id)
    {
        $this->initTable();

        $qb = $this->createQueryBuilder(self::$FIELDS);
        $qb ->where($qb->expr()->eq(
            self::TABLE_ALIAS . '.' . self::FIELD_ID,
            $qb->createNamedParameter($id)
        ))
            ->setMaxResults(1);

        $row = $qb->execute()->fetch(PDO::FETCH_ASSOC);

        if (! $row) {
            return null;
        }

        return $this->createEntity($row);
    }

    public function getList($hideExpired = true)
    {
        $this->initTable();

        $qb = $this->createQueryBuilder(self::$FIELDS);
        if ($hideExpired) {
            $qb ->where($qb->expr()->neq(
                self::TABLE_ALIAS . '.' . self::FIELD_STATUS,
                $qb->createNamedParameter(RsaKeyStatus::EXPIRED)
            ));
        }

        return array_map([$this, 'createEntity'], $qb->execute()->fetchAll(PDO::FETCH_ASSOC));
    }

    // public : table management //

    public function initTable()
    {
        if ($this->tableStatus === self::TABLE_STATUS_READY) {
            // The work was done already.
            return;
        }

        $schemaManager = $this->connection->getSchemaManager();
        $tableName = $this->getTableName();
        if ($schemaManager->tablesExist([$tableName])) {
            // TODO: Update schema if it differs.
            // Eerything's fine.
            $this->tableStatus = self::TABLE_STATUS_READY;
            return;
        }

        // Table definition.
        $table = new Table($tableName);
        $table->addColumn(self::FIELD_ID, 'integer', [
            'autoincrement' => true,
            'unsigned' => true,
            'notnull' => true,
        ]);
        $table->addColumn(self::FIELD_STATUS, 'integer', [
            'length' => 1,
            'notnull' => true,
            'default' => RsaKeyStatus::UNSENT,
        ]);
        $table->addColumn(self::FIELD_PUBLIC_KEY, 'string', [
            'length' => 300,
            'notnull' => true,
        ]);
        $table->addColumn(self::FIELD_PRIVATE_KEY, 'string', [
            'length' => 1000,
            'notnull' => true,
        ]);
        $table->addColumn(self::FIELD_EXPIRATION, 'datetime', [
            'notnull' => false,
        ]);
        $table->addColumn(self::FIELD_DIGEST, 'string', [
            'length' => 28,
            'notnull' => false,
        ]);
        $table->setPrimaryKey([self::FIELD_ID]);

        $schemaManager->createTable($table);
        $this->tableStatus = self::TABLE_STATUS_READY;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    // protected //

    /**
     * Create RsaKeyEntity from associative massive.
     *
     *  @param  array<FIELD_*, string>  $row
     *  @return RsaKeyEntity
    **/
    protected function createEntity(array $row)
    {
        return new RsaKeyEntity(
            $row[self::FIELD_ID],
            $row[self::FIELD_STATUS],
            $row[self::FIELD_PUBLIC_KEY],
            $row[self::FIELD_PRIVATE_KEY],
            $row[self::FIELD_EXPIRATION],
            $row[self::FIELD_DIGEST]
        );
    }

    protected function createQueryBuilder(array $fields)
    {
        return $this->connection->createQueryBuilder()
            ->select(array_map(function ($field) { return implode('.', [self::TABLE_ALIAS, $field]); }, $fields))
            ->from($this->getTableName(), self::TABLE_ALIAS);
    }
}
