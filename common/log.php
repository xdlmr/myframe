<?php

/**
 * 日志类
 */
class Log {
    
    private $path;
    
    function __construct() {
        $this -> path = LOG_FILE_PATH;
    }
    
    public function setLog($message, $file = 'log', $drive = LOG_DRIVE_FILE) {
        if($drive == LOG_DRIVE_FILE) {
            $logpath = $this -> path . '/' . date('Ymd') . '/' . date('H');
            if(!is_dir($logpath)) {
                mkdir($logpath, 0777, true);
            }
            $message = date('Y-m-d H:i:s') . "\t" . json_encode($message) . PHP_EOL;
            return file_put_contents($logpath . '/' . $file . '.log', $message, FILE_APPEND);
        } else if($drive == LOG_DRIVE_SQL) {
            
        } else {
            throw new Exception('没有该日志驱动：' . $drive);
        }
    }
    
    public function getLog($data = '', $hour = '', $file = 'log', $drive = LOG_DRIVE_FILE) {
        if(empty($data))
            $data = date('Ymd');
        if(empty($hour))
            $hour = $hour;
        if($drive == LOG_DRIVE_FILE) {
            $logpath = $this -> path . '/' ;
            $logfile = glob($logpath . '*/*/*.log');
            $retarr = array();
            foreach($logfile as $key => $value) {
                $logarr = file($value);
                $logarr = preg_replace("/(".PHP_EOL.")/", '', $logarr);
                foreach($logarr as $k => $val) {
                    $dataarr = preg_split('/(\t)/', $val);
                    array_push($retarr,$dataarr);
                }
            }
            return $retarr;
        } else if($drive == LOG_DRIVE_SQL) {
            
        } else {
            throw new Exception('没有该日志驱动：' . $drive);
        }
    }
}