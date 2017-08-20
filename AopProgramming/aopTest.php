<?php
/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午1:11
 */
include '.' . DIRECTORY_SEPARATOR . 'autoload.php';

$user = new Logger(new User());
$user->set_name('muZi');
$name = $user->get_name();
echo "name = $name" . PHP_EOL;