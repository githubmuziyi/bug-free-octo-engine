<?php
/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午1:03
 */
function loadFile($class) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = '.' . DIRECTORY_SEPARATOR . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('loadFile');