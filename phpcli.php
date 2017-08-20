#!/usr/local/bin/php
<?php
/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/11/19
 * Time: 下午11:16
 */
//echo $_SERVER['argc'] . "\n";
//echo json_encode($_SERVER['argv']) . "\n";

//UNIX平台下第一行应该为
/* 如果STDIN未定义，将新定义一个STDIN输入流 */
/*if(!defined("STDIN")) {
    define("STDIN", fopen('php://stdin','r'));
} echo "你好!你叫什么名字(请输入):\n";
$strName = fread(STDIN, 100);
//从一个新行读入80个字符
echo '欢迎你'.$strName."\n";*/
fwrite(STDOUT, 'Enter your name:');
$name = trim(fgets(STDIN));
fwrite(STDOUT, 'Enter your age:');
$age = trim(fgets(STDIN));
fwrite(STDOUT, "Hello $name! your age is $age \n");

