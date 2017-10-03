<?php

namespace IpApi;

use Exception;

/**
 * Class IpInfoException
 * @package IpApi
 */
class IpInfoException extends Exception
{
    /**
     * IpInfoException constructor.
     *
     * @param string $message
     * @param int    $code
     */
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}