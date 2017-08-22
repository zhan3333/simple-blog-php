<?php

/**
 * @desc
 * @author zhan <grianchan@gmail.com>
 * @since 2017/8/22 16:06
 */
include_once __DIR__ . '/../Instance.php';
class Log extends Instance
{
    public static $log_path;

    private static $log;

    public static function instance()
    {
        if (empty(self::$log)) self::$log = new self();
        return self::$log;
    }
    
    /**
     * @return mixed
     */
    public static function getLogPath()
    {
        return self::$log_path;
    }

    /**
     * @param mixed $log_path
     */
    public static function setLogPath($log_path)
    {
        self::$log_path = $log_path;
    }


    /**
     * 记录日志
     * @param $msg
     */
    public function file_log($msg)
    {
        if (!is_scalar($msg)) {
            $msg = json_encode($msg, JSON_UNESCAPED_UNICODE);
        }
        $msg = $msg . PHP_EOL;
        $path = self::$log_path . '/debug.log';
        file_put_contents($path, $msg, FILE_APPEND);
    }
}