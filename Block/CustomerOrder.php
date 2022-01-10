<?php

namespace Test\Test\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Sales\Model\ResourceModel\Order\Collection;

/**
 * 根据邮箱获取订单列表
 */
class CustomerOrder extends Template
{
    private $data;
    private $context;
    private $orderCollectionFactory;

    public function __construct(
        Context $context,
        Collection $orderCollection,
        array $data = []
    ) {
        $this->orderCollection = $orderCollection;
        // $this->logger = $logger;
        parent::__construct($context, $data);
    }

    public function getCustomerOrderList($customerEmail)
    {
        $customerOrderList = $this->orderCollection->create()
            ->addAttributeToFilter('customer_email', $customerEmail)->load();
        return $customerOrderList->getData();
    }
}
