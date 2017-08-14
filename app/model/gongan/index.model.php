<?php

class IndexModel {
    private $_db;
    private $_log;
    function __construct() {
         $this->_db = DB::getInstance();
        // $this->_log = new Log();
    }
    public function dologin(){

        $sql = "select * from users";
        $res = $this->_db->getAll($sql);
        // var_dump($res);

       // $res = $this->_db->select('user',['userid','pwd']);
        if($res){
            return $res;
        }else{
            return -1;
        }
    }
}