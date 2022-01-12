<?php

namespace Test\Test\Controller\Index;

/**
 * 获取系统日期时间
 */
class GetSystemTime extends \Magento\Framework\App\Action\Action
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
        // var_dump(date('Y-m-d H:i:s', time()));

        /* （2） */
        $date = $this->date->gmtDate();
        var_dump($date);
        exit;
    }
}
