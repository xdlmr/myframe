<?php
define("WEB_ROOT", realpath('./'));//项目根路径
date_default_timezone_set('Etc/GMT-8');
require_once WEB_ROOT . '/config/config.php';//配置文件
require_once WEB_ROOT . '/vendor/autoload.php';//自动加载

if(DEBUG) {
    $whoops = new Whoops\Run();
    $errorTitle = "0.0 出错啦!!!";
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option -> setPageTitle($errorTitle);
    $whoops -> pushHandler($option);
    $whoops -> register();
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}
$router = new \Klein\Klein();

$router -> respond([ 'GET', 'POST' ], '/[:controller]/[:func]', function($request, $response, $service) {
    $obj = Box ::getObject($request -> controller);
    if($obj == null) {
        header('HTTP/1.1 404 Not Found');
        return;
    }
    $func = $request -> func;
    $response -> header('Content-Type', 'text/json');
    return json_encode($obj -> $func($request));
});

$router -> respond([ 'GET', 'POST' ], '/[:controller]', function($request, $response, $service) {
    $obj = Box ::getObject($request -> controller);
    if($obj == null) {
        header('HTTP/1.1 404 Not Found');
        return;
    }
    $func = "render";
    return $obj -> $func($request);
});

$router -> respond([ 'GET', 'POST' ], '/[:controller]/', function($request, $response, $service) {
    $obj = Box ::getObject($request -> controller);
    if($obj == null) {
        header('HTTP/1.1 404 Not Found');
        return;
    }
    $func = "render";
    return $obj -> $func($request);
});

$router -> respond('GET', '/', function() {
    // return 'Hello World!';
    
    $controller = "index";
    $func = "render";
    $obj = Box ::getObject($controller);
    // var_dump($obj);
    if($obj == null) {
        header('HTTP/1.1 404 Not Found');
        return;
    }
    return $obj -> $func();
});
$router -> dispatch();