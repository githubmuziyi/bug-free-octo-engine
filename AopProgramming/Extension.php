<?php

/**
 * 拓展接口
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午1:40
 */
interface Extension {
    public function beforeAppend(&$params);
    public function afterAppend(&$params);
}