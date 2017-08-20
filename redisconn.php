<?php
/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/11/19
 * Time: 上午1:07
 */

    //redis本地链接测试
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    echo 'Connection to server sucessfully';
    echo '<br/>';
    //服务运行情况
    echo 'Server is running:' . $redis->ping();
    echo '<br/>';
    $redis->set('key1', 'test1');
    echo $redis->get('key1');
    echo '<br/>';
    $obj = new stdClass();
    $obj->name = 'muzi.he';
    $obj->age = 23;
    $redis->hMset('obj', ['muzi.he', 23]);
    $obj_str = $redis->hGetAll('obj');
    var_dump($obj_str);



