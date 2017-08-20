<?php

/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午1:53
 */
class ExampleExtension implements Extension {
    public $check = FALSE;

    public function beforeAppend(&$isLogin) {
        // TODO: Implement beforeAppend() method.
        if ($isLogin) {
            $this->check = TRUE;
        }
    }

    public function afterAppend(&$pointer)
    {
        // TODO: Implement afterAppend() method.
        if ($this->check) {
            //add pointer
        } else {
            echo '未登录用户' . PHP_EOL;
            return;
        }
    }
}