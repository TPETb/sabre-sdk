<?php
namespace Sabre\Logger;

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Sabre\Logger\Exceptions\LoggerTypeUnknownException;

class LoggerFactory
{
    /**
     *  @param  array   $config [
     *      'type' => string? Logger type.
     *          If falsy, an instance of null logger is returned.
     *          Only 'error_log' is supported.
     *      'name' => string Logger name.
     *  ]
     *  @return LoggerInterface
    **/
    public static function factory(array $config)
    {
        if (! isset($config['type']) || empty($config['type'])) {
            return new NullLogger();
        }
        switch ($config['type']) {
            case 'error_log':
                return new ErrorLogLogger();

            default:
                throw (new LoggerTypeUnknownException('Unknown logger type "' . $config['type'] . '"'))
                    ->setType($config['type']);
        }
    }
}
