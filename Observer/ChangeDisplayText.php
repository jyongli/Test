<?php

namespace Test\Test\Observer;

/**
 * 观察者类
 */
class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $displayText = $observer->getData('mp_text');
        // echo '<pre>';var_dump($displayText);exit;
        echo $displayText->getText() . " - Event </br>";
        $displayText->setText('Execute event successfully.');
        return $this;
    }
}
