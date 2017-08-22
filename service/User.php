<?php

/**
 * @desc
 * @author zhan <grianchan@gmail.com>
 * @since 2017/8/22 15:42
 */
class User
{
    private static $user;

    /**
     * 获取单实例
     * @return User
     */
    public static function instance()
    {
        if (empty(self::$user)) self::$user = new self();
        return self::$user;
    }

    /**
     * 用户登陆操作
     */
    public function login()
    {
        return '准备登陆啦';
    }

    public function loginOut()
    {
        
    }


}