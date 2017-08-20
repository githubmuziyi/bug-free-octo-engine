<?php
/**
 * Created by PhpStorm.
 * User: muzi
 * Date: 2017/3/25
 * Time: 下午2:22
 */

/**
 * socket编程之I/O多路复用Reactor模型
 */
$reactor = new Reactor();
$server_sock = stream_socket_server("tcp://0.0.0..0:8080");
$reactor->add($server_sock, EV_READ, function () use ($server_sock, $reactor) {
    $client_sock = stream_socket_accept($server_sock);
    $reactor->add($client_sock, EV_READ, function () use ($client_sock, $reactor) {
        $request = fread($client_sock);
        $reactor->add($client_sock, EV_WRITE, function () use ($client_sock, $request, $reactor) {
            fwrite($client_sock, "Hello world \n");
            $reactor->del($client_sock);
            fclose($client_sock);
        });
    });
});