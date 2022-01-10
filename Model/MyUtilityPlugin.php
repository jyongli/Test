<?php

namespace Test\Test\Plugin;

class MyUtilityPlugin
{
    /**
     * 注意：missing = null
     * 如果与 null 一起调用该方法，PHP 将产生致命错误，因为您的插件中不允许您的插件 null。此外，遵循方法调用的插件中的参数也很重要。但如果不关心参数，请使用可变参数和参数解包来完成：
     */
    public function aroundSave(\Test\Test\Model\MyUtility $subject, callable $proceed, ...$args)
    {
        //do something
        $proceed(...$args);
    }
}
