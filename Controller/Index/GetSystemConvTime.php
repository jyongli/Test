<?php

namespace Test\Test\Controller\Index;

/**
 * 获取系统日期校准后的时间
 * 【magento2系统时间和当前时间可能会不一样的，而且没办法校正，就算校正了也会报错，连后台都登陆不了，只能通过调用下面方法转换】
 * 系统会默认把timezone设置为UTC，获取正确时间时需要根据时区来转换，直接拿来用会差几个小时的
 * 在bootstrap.php设置timezone，系统不会生效的，反而后台会登陆不上
 */
class GetSystemConvTime extends \Magento\Framework\App\Action\Action
{
    protected $date;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        parent::__construct($context);
        $this->date = $date;
    }

    public function execute()
    {
        /* （1） */
        // date_default_timezone_set('Asia/Shanghai');
        // var_dump(date('Y-m-d H:i:s', time()));

        /* （2） */
        // date_default_timezone_set('Asia/Shanghai');
        // $date = $this->date->gmtDate();
        // var_dump($date);

        /* （3） */
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $timezone = $objectManager->create('\Magento\Framework\Stdlib\DateTime\TimezoneInterface');
        $date = $timezone->date(new \DateTime($this->date->gmtDate()));
        var_dump($date->format('Y-m-d H:i:s'));
        exit;
    }
}
