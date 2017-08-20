<?php

/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午1:24
 */
class ExtensionFactory {
    private static $extFamily = NULL;
    private static $_classes = [
        'Extension' => '/Extension.php',
        'ExtensionFamily' => '/ExtensionFamily.php'
    ];

    /**
     * __autoload() magic method
     */
    public static function autoLoad() {
        foreach (self::$_classes as $_class) {
            require_once dirname(__FILE__) . $_class;
        }
    }

    /**
     * 必须先调用此方法来实例化拓展族,才能调用addExtension\removeExtension等
     * @return ExtensionFamily|null
     */
    public static function createExtension() {
        self::$extFamily = new ExtensionFamily();
        return self::$extFamily;
    }

    /**
     * 移除拓展
     * @param $extName
     * @return bool
     * @throws Exception
     */
    public static function removeExtension($extName) {
        if (is_null(self::$extFamily)) {
            throw new Exception("Please creatExtension first");
            return FALSE;
        } else {
            unset(self::$extFamily->_extensionArray[$extName]);
        }
    }

    /**
     * 添加拓展
     * @param $extName
     * @param Extension $ext
     * @return bool
     * @throws Exception
     */
    public static function addExtension($extName, Extension $ext) {
        if (is_null(self::$extFamily)) {
            throw new Exception("Please creatExtension first");
            return FALSE;
        } else {
            self::$extFamily->_extensionArray[$extName] = $ext;
        }
    }

    /**
     * 移除全部拓展
     * @return bool
     * @throws Exception
     */
    public static function removeAllExtension() {
        if (is_null(self::$extFamily)) {
            throw new Exception("Please creatExtension first");
            return FALSE;
        } else {
            self::$extFamily->_extensionArray = [];
        }
    }
}