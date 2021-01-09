<?php
class Config
{
    private static $config = [

    ];

    public static function set($name, $value)
    {
        self::$config[$name] = $value;
    }

    public static function get($name)
    {
        return self::$config[$name];
    }
}

function config($name)
{
    return Config::get($name);
}