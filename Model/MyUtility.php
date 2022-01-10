<?php
namespace Test\Test\Model;

class MyUtility
{
    /**
     * 如果你的插件被一个与参数匹配的方法调用，它也必须与它们匹配，同时，你需要仔细遵循它们。在此过程中，请注意方法的原始签名以及默认参数和建议的种类。
     * 例如，应用以下代码来识别 SomeType 类型的参数，即nullable：
     */
    public function save(SomeType $obj = null)
    {
        //do something
    }
}