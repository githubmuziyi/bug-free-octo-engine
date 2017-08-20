<?php

/**
 * Created by PhpStorm.
 * User: hewei
 * Date: 2016/12/14
 * Time: 上午1:43
 */
class ExtensionFamily implements Extension {
    public $_extensionArray = [];

    /**
     * 扩充家族拓展
     * @param $extName
     * @param Extension $ext
     */
    public function addExtension($extName, Extension $ext) {
        $this->_extensionArray[$extName] = $ext;
    }

    public function beforeAppend(&$params) {
        // TODO: Implement beforeAppend() method.
        foreach ($this->_extensionArray as $_ext) {
            $_ext->beforeAppend($params);
        }
    }

    public function afterAppend(&$params) {
        // TODO: Implement afterAppend() method.
        foreach ($this->_extensionArray as $_ext) {
            $_ext->afterAppend($params);
        }
    }
}