<?php

/**
 * @desc
 * @author zhan <grianchan@gmail.com>
 * @since 2017/8/22 17:38
 */
class Instance
{
    /**
     * 实例储存
     * @var
     */
    private static $instances = [];

    /**
     * 获取单实例
     * @return Instance
     */
    public static function single_instance()
    {
        $name = static::class;
        if (empty(self::$instances[$name])) self::$instances[$name] = new static();
        return self::$instances[$name];
    }
}