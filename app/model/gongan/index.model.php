<?php

class IndexModel {
    private $_db;
    private $_log;
    function __construct() {
         $this->_db = DB::getInstance();
        // $this->_log = new Log();
    }
    public function dologin(){
        // $sql = "select * from user";
        $res = $this->_db->select('user',['userid','pwd']);
        if($res){
            return $res;
        }else{
            return -1;
        }
    }
}