<?php
namespace Sabre\Cryptography\RSA;

final class RsaKeyStatus
{
    // IMPORTANT: Do not change constant values, as they are stored in DB as integers,
    // a restriction imposed by the lack of support of enum type in Doctrine.
    const UNSENT         = 4;
    const UNCONFIRMED    = 0;
    const FUTURE         = 1;
    const CURRENT        = 2;
    const EXPIRED        = 3;

    protected static $NAMES = [
        self::UNSENT      => 'unsent',
        self::UNCONFIRMED => 'unconfirmed',
        self::FUTURE      => 'future',
        self::CURRENT     => 'current',
        self::EXPIRED     => 'expired',
    ];

    public static function getName($code)
    {
        return self::$NAMES[$code];
    }

    public static function fromName($name)
    {
        return array_search($name, self::$NAMES);
    }
}
