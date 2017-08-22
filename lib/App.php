<?php

/**
 * @desc 引入库文件类
 * @author zhan <grianchan@gmail.com>
 * @since 2017/8/22 15:36
 */
require_once 'response/Response.php';
require_once 'log/Log.php';

class App
{
    /**
     * @return Response
     */
    public static function response()
    {
        return Response::single_instance();
    }

    /**
     * @return Log
     */
    public static function log()
    {
        return Log::single_instance();
    }
}