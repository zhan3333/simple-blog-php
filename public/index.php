<?php
/**
 * @desc 项目入口
 * @author zhan <grianchan@gmail.com>
 * @since 2017/8/22 15:38
 */

define('ROOT_PATH', realpath(__DIR__ . '/../'));
define('SERVICE_PATH', ROOT_PATH . '/service/');
define('LIB_PATH', ROOT_PATH . '/lib/');

require_once __DIR__ . '/../lib/App.php';

// 设置自动载入service类
spl_autoload_register(function ($class) {
    $service_path = SERVICE_PATH . $class . '.php';
    if (file_exists($service_path)) {
        require_once $service_path;
    }
});

// 初始化日志路径
$log = App::log();
$log::setLogPath(ROOT_PATH . '/log/');

// 处理action
$action = empty($_POST['action'])?'':trim($_POST['action']);
if (empty($action)) return App::response()->json([], 'action必须指定', -1);
$action_arr = explode('_', $action);
if (empty($action_arr[0]) || empty($action_arr[1])) return App::response()->json([], 'action不合法', -1);

// 调用类指定的方法
if (is_callable([$action_arr[0], $action_arr[1]])) {
    $ret = call_user_func_array([$action_arr[0], $action_arr[1]], $_POST);
    return App::response()->json($ret);
} else {
    return App::response()->json([], 'action对应接口不存在', -1);
}

