<?php

/**
 * 函数库
 */

function p($val) {
    if(is_bool($val)) {
        var_dump($val);
    } elseif(is_null($val)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:18px;border_redius:5px;background:#f5f5f5;border:1px solid #aaa;font-size:14px;line-height:18px;opactity:0.9'>" . print_r($val, true) . "</pre>";
    }
}