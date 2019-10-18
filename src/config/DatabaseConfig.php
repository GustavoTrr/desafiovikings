<?php

namespace Viking\Config;

class DatabaseConfig extends Config
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getDriver()
    { 
        return self::getEnv('DB_DRIVER');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getHost()
    { 
        return self::getEnv('DB_HOST');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getPort()
    { 
        return self::getEnv('DB_PORT');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getDB()
    { 
        return self::getEnv('DB_DATABASE');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getUser()
    { 
        return self::getEnv('DB_USERNAME');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getPassword()
    { 
        return self::getEnv('DB_PASSWORD');
    }

}
