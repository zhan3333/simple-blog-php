<?php

/**
 * @desc
 * @author zhan <grianchan@gmail.com>
 * @since 2017/8/22 15:52
 */
include_once __DIR__ . '/../Instance.php';
class Response extends Instance
{
    /**
     * 返回json类型数据
     * @param array $data
     * @param string $msg
     * @param int $code
     * @param bool $exit
     * @return string
     */
    public function json($data = [], $msg = 'success', $code = 0, $exit = true)
    {
        $ret = json_encode([
            'data' => $data,
            'msg' => $msg,
            'code' => $code
        ], JSON_UNESCAPED_UNICODE);

        if ($exit) {
            exit($ret);
        } else {
            return $ret;
        }
    }
}