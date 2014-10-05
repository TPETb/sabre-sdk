<?php
namespace Sabre\Logger;

use Psr\Log\AbstractLogger;

class ErrorLogLogger extends AbstractLogger
{
    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        error_log($this->formatMessage($level, $message, $context));
    }

    // protected //

    protected function formatMessage($level, $message, array $context = [])
    {
        return implode('', [
            '[', $level, '] ',
            preg_replace_callback(
                '~\{([\w]+)\}~',
                function ($matches) use ($context) {
                    if (isset($context[$matches[1]])) {
                        return $context[$matches[1]];
                    }
                    return $matches[1];
                },
            $message
            )
        ]);
    }
}
