<?php

/**
 * medoo数据库类
 */

/*class DB {
    private static $_instances = [];
    
    public function __construct() {
    }
    
    public static function getInstance($database = DB_NAME) {
        // var_dump($database);
        if(!isset(self ::$_instances[$database]) || is_null(self ::$_instances[$database])) {
            $db = new \Medoo\Medoo([
                'database_type' => DB_TYPE,
                'database_name' => DB_NAME,
                'server' => DB_IP,
                'port' => DB_PORT,
                'username' => DB_USERNAME,
                'password' => DB_PASSWORD,
                'charset' => 'utf8'
            ]);
            self ::$_instances[$database] = $db;
        }
        return self ::$_instances[$database];
    }
    
    public function __clone() {
    }
}*/



//创建adodb数据库连接
class DB{
    private static $_instances = [];

    private function __construct() {
    }

    public static function getInstance ($database = DB_NAME,$driver = DRIVER) {
        if ( !isset(self::$_instances[$database]) || is_null(self::$_instances[$database]) ) {
            $db = NewADOConnection($driver);
            $link = $db->Connect(DB_IP . ':' . DB_PORT, DB_USERNAME, DB_PASSWORD, $database);
            $db->SetFetchMode(ADODB_FETCH_ASSOC);
            self::$_instances[$database] = $db;
        }
        return self::$_instances[$database];
    }

    public function __clone(){}
}
?>
