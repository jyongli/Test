<?php

namespace Test\Test\Controller\Index;

/**
 * 删除指定用户
 */
class DeleteCustomer extends \Magento\Framework\App\Action\Action
{
    protected $customerRepository;
    protected $resultJsonFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,//操作数据模型时尽量使用api内置类而不是使用model数据模型类
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->customerRepository = $customerRepository;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        try {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $registry = $objectManager->get('Magento\Framework\Registry');
            $registry->register('isSecureArea', 'true');
            $customerid = '7';
            $this->customerRepository->deleteById($customerid);
            $registry->unregister('isSecureArea');
            return $result->setData('删除成功');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $result->setData($e->getMessage());
        }
    }
}
