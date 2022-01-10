<?php

namespace Test\Test\Controller\Index;

/**
 * 创建新用户
 */
class CustomerCreate extends \Magento\Framework\App\Action\Action
{
    protected $storeManager;
    protected $customerFactory;
    protected $customerRepository;
    protected $resultJsonFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,

        //操作数据模型时尽量使用api内置类而不是使用model数据模型类
        // \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Api\Data\CustomerInterfaceFactory $customerFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
    ) {
        parent::__construct($context);
        $this->storeManager     = $storeManager;
        $this->customerFactory  = $customerFactory;
        $this->customerRepository = $customerRepository;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        try {
            $customer = $this->customerFactory->create();

            $customer->setWebsiteId($this->storeManager->getStore()->getWebsiteId());
            $customer->setEmail("2233502514@qq.com");
            $customer->setFirstname("First Name");
            $customer->setLastname("Last name");
            // $customer->sendNewAccountEmail();

            $customer = $this->customerRepository->save($customer, "password");
            return $result->setData('success');
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $result->setData($e->getMessage());
        }
    }
}
