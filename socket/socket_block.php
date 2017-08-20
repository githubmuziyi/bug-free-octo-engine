<?php
/**
 * Created by PhpStorm.
 * User: muzi
 * Date: 2017/3/25
 * Time: 下午2:08
 */

$server = stream_socket_server("tcp://0.0.0.0:8000", $errno, $errstr) or die('create server failed');
for ($i = 0; $i < 32; ++$i) {
    if (pcntl_fork() == 0) {
        while (1) {
            $connect = stream_socket_accept($server);
            if ($connect == FALSE) continue;
            $request = fread($connect, 8192);
            $response = 'hello world';
            fwrite($connect, $response);
            fclose($connect);
        }
        exit(0);
    }
}