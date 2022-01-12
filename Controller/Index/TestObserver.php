<?php

namespace Test\Test\Controller\Index;

/**
 * 观察器 
 * 1.controller调度事件
 * 2.创建订阅事件配置文件events.xml
 * 3.创建观察者类ChangeDisplayText.php
 */
class TestObserver extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => '测试数据'));
        // 触碰test_test_display_text事件并传递数据
        $this->_eventManager->dispatch('test_test_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}
