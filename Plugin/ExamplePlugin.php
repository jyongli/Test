<?php

namespace Test\Test\Plugin;

use \Test\Test\Controller\Interceptor\Example;

/**
 * 拦截器
 */
class ExamplePlugin
{
    /**
     * Before 方法是被观察方法中最先运行的方法，并且这些方法必须与被观察者的名称具有相同的名称，而前缀标签是before。
     * 要应用修改观察方法的参数的 before 方法，您可以返回修改后的参数。如果有多个参数，将根据这些参数的范围进行返回。如果返回无效，则意味着不应修改被观察方法的参数。
     */
    public function beforeSetTitle(Example $subject, $title)
    {
        $title .= " to ";
        echo __METHOD__ . "</br>";
        return [$title];
    }

    /**
     * After 方法在被观察方法完成后立即开始运行，并且这些方法必须与被观察者的名称具有相同的名称，而前缀标签是“after”。
     * After 方法负责以正确的方式编辑观察到的方法的结果并被要求具有返回值。
     */
    public function afterGetTitle(Example $subject, $result)
    {
        echo __METHOD__ . "</br>";
        return $result . '.com';
    }

    /**
     * Around方法允许代码在被观察的方法之前和之后运行，因此您可以覆盖一个方法。这些方法必须与被观察者的名字同名，而前缀标签是“around”。
     * 在原始方法的参数排列之前，一个callablefrom around 方法将被调用到链中的下一个方法，这意味着下一个插件或被观察的函数也被调用。
     * 注意：如果callable没有声明，则调用下一个插件和原始方法都不会实现。
     */
    public function aroundGetTitle(Example $subject, callable $proceed)
    {
        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo __METHOD__ . " - After proceed() </br>";
        return $result;
    }
}
