<?php

define("DEBUG", true);//调试模式
define("PRODUCT", 'gongan');


// 数据库地址
define('DB_TYPE', 'pgsql');
define('DB_IP', '127.0.0.1');
define('DB_PORT', '5432');
define('DB_USERNAME', 'postgres');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'chuxiongpolice');

//日志驱动，默认file
define('LOG_DRIVE_FILE','file');
define('LOG_FILE_PATH',WEB_ROOT.'/log');//注意文件夹读写权限
define('LOG_DRIVE_SQL','sql');

//views 层目录
define('PRODUCT_TEMPLATE_DIR', WEB_ROOT . "/" . 'views');

//相应状态
define('CODE_SUCCESS', 200);
define('CODE_ERROR', 300);