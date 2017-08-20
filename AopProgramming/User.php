<?php

/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午12:56
 */
class User {
    private $name;

    function set_name($value) {
        $this->name = $value;
    }

    function get_name() {
        return $this->name;
    }
}