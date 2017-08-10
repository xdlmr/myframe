<?php

/**
 * 加载指定类型的类程序
 **/
class Box {
    public static $_modelObjArr;
    
    public static function getObject($_appName, $_typeStr = 'controller', $product = '') {

        $_appName = strtolower($_appName);
        $_typeStr = strtolower($_typeStr);

        $className = $_appName . ucfirst($_typeStr);
        
        if(isset(self ::$_modelObjArr[$className]) && is_object(self ::$_modelObjArr[$className])) {
            return self ::$_modelObjArr[$className];
        }
        $appdir = ( $product === '' ) ? PRODUCT : $product;
        
        $file = WEB_ROOT . "/app/${_typeStr}/" . $appdir . "/${_appName}.${_typeStr}.php";
        
        if(file_exists($file)) {
            
            include_once $file;

            if(class_exists($className)) {
                var_dump(self ::_createObject($className));
                return self ::_createObject($className);
                
            }
        }
        return null;
    }
    
    public static function controller($appname, $product) {
        return self ::getObject($appname, 'controller', $product);
    }
    
    public static function model($appname, $product) {
        return self ::getObject($appname, 'model', $product);
    }
    
    public static function _createObject($_className) {
        // var_dump($_className);
      if(isset(self ::$_modelObjArr[$_className]) && is_object(self ::$_modelObjArr[$_className])) {
            return self ::$_modelObjArr[$_className];
        } else {
            self ::$_modelObjArr[$_className] = new $_className();
            // var_dump(self::$_modelObjArr);
            return self ::$_modelObjArr[$_className];
        }
    }
    
    //错误提示
    public static function _showErr($_errTypeStr = '') {
        echo $_errTypeStr;
        exit;
        //errorlog($_errTypeStr);
    }
}//end class
?>
