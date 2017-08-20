<?php

/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午12:58
 */
class Logger {
    private $obj;

    function __call($method, $args) {
        echo ("$method( " . join(',', $args) . " )\n");
        return call_user_func_array(array(&$this->obj, $method), $args);
    }

    function __construct($obj) {
        $this->obj = $obj;
    }
}