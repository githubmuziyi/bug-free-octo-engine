<?php
/**
 * Created by PhpStorm.
 * User: muzi
 * Date: 2017/4/24
 * Time: 下午10:23
 */
namespace payment;

use Omnipay\Omnipay;

require '../vendor/autoload.php';

class PayMent {

    public function __construct()
    {
        //init
    }

    /*
     * 创建支付订单
     */
    public function create_order() {
        $config['app_id'] = '1213123123';
        $config['mch_id'] = '123123123';
        $config['api_key'] = 'fsdfdsfsdfsd';

        $gateway = Omnipay::create('WechatPay_App');
        $gateway->setAppId($config['app_id']);
        $gateway->setMchId($config['mch_id']);
        $gateway->setApiKey($config['api_key']);
        $gateway->setNotifyUrl('http://example.com/notify');

        $order = [
            'body'              => 'The test order',
            'out_trade_no'      => date('YmdHis').mt_rand(1000, 9999),
            'total_fee'         => 1, //=0.01
            'spbill_create_ip'  => 'ip_address',
            'fee_type'          => 'CNY'
        ];

        $request  = $gateway->purchase($order);
        $response = $request->send();

        //available methods
        //return $response->isSuccessful();
        return $response->getData(); //For debug
        //return $response->getAppOrderData(); //For WechatPay_App
        //$response->getJsOrderData(); //For WechatPay_Js
        //$response->getCodeUrl(); //For Native Trade Type
    }
}

$payment_obj = new PayMent();
var_dump($payment_obj->create_order());
