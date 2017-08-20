<?php

/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/20
 * Time: 下午10:22
 */
class testStatic {

    private $tmp = 0;
    public static $sta = 0;
    public static $staObj = NULL;

    public function __construct() {
        self::$staObj = new stdClass();
        self::$staObj->name = 'muzi';
        self::$staObj->age = 22;
    }

    public function addSta() {
        self::$sta = self::$sta + 1;
    }

    public function getSta() {
        return self::$sta;
    }

    public function getTmp() {
        return $this->tmp;
    }

    public function getStaObj() {
        return self::$staObj;
    }

    public function setTmp() {
        return $this->tmp = clone self::$staObj;
    }

    public function addTmp() {
        unset($this->tmp->name);
    }
}

$testStd = new testStatic();
$testStd->addSta();
//echo $testStd->getSta() . "\n";
$testStd2 = new testStatic();
$testStd2->addSta();
//echo $testStd2->getSta() . "\n";
var_dump($testStd->getStaObj());
$testStd->setTmp();
var_dump($testStd->getTmp());
$testStd->addTmp();
var_dump($testStd->getTmp());
var_dump($testStd->getStaObj());