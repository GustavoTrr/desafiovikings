<?php

namespace Viking\Config;

class MailConfig extends Config{
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getDriver()
    { 
        return self::getEnv('MAIL_DRIVER');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getHost()
    { 
        return self::getEnv('MAIL_HOST');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getPort()
    { 
        return self::getEnv('MAIL_PORT');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getEncryption()
    { 
        return self::getEnv('MAIL_ENCRYPTION');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getUser()
    { 
        return self::getEnv('MAIL_USERNAME');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getPassword()
    { 
        return self::getEnv('MAIL_PASSWORD');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getFromAddress()
    { 
        return self::getEnv('MAIL_FROM_ADDRESS');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getFromName()
    { 
        return self::getEnv('MAIL_FROM_NAME');
    }
}