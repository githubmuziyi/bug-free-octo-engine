<?php
/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午1:56
 */
include '.' . DIRECTORY_SEPARATOR . 'autoload.php';

$ext = ExtensionFactory::createExtension();
ExtensionFactory::addExtension('example', new ExampleExtension());

/**
 * 按照需求的变化,可以增加相应的Extension
 * 新需求: 新增会员类型,根据不同类型,进行价格优惠
 * 实现思路:
 * 1.建立卡号类型工厂
 * 2.建立SeniorMemberExtension、PuTongMemberExtension
 * 3.工厂方法根据会员类型addExtension
 */
$isLogin = FALSE; //假设未登录
$ext->beforeAppend($isLogin);

/**
 * 面向切面编程,最总重要的一点:必须先分析出整个业务处理中,哪个才是重点
 * 这里的重点是订单的入库
 * 在订单入库之前可能业务逻辑不断增加,例如:登陆验证,卡上余额验证等
 * 在订单入库之后:积分处理,订单监控等
 */
echo "此处主要是业务逻辑:订单入库\r\n";
$pointer = 100;
$ext->afterAppend($pointer);
