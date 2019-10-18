<?php

namespace Viking\Config;

class Config {

    public static function getBasePath()
    {
        return substr(__DIR__,0,-11);
    }

    public static function getEnv($parametroDesejado)
    {
        $path = self::getBasePath() . '/.env';
        $arrParametros = parse_ini_file($path);
        return $arrParametros[$parametroDesejado] ?? null;
    }
}