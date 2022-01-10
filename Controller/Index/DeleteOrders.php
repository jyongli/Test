<?php

namespace Test\Test\Controller\Index;

/** 
 * 根据用户邮箱删除订单(删除测试订单用)
 */
class DeleteOrders extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
    protected $_orderRepository;
    protected $orderCollection;
    protected $CollectionFactory;
    protected $messageManager;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $CollectionFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_orderRepository = $orderRepository;
        $this->CollectionFactory = $CollectionFactory;
    }
    public function execute()
    {
        try {
            $result = $this->resultJsonFactory->create();
            $customerEmailId = ['2632050683@qq.com'];
            $customerOrderList = $this->CollectionFactory->create()->addAttributeToFilter('customer_email', $customerEmailId)->load();

            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $registry = $objectManager->get('Magento\Framework\Registry');
            foreach ($customerOrderList->getData() as $o) {
                $order = $objectManager->create(\Magento\Sales\Model\Order::class)->load($o['entity_id']);
                $registry->register('isSecureArea', 'true');
                $order->delete();
                $registry->unregister('isSecureArea');
            }
            return $result->setData('删除订单');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }
}
