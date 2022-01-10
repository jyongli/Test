<?php

namespace Test\Test\Controller\Index;

/**
 * 测试后台配置信息获取
 */
class TestSystemConfig extends \Magento\Framework\App\Action\Action
{
    protected $scopeConfig;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }
    public function execute()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $data = [
            $this->scopeConfig->getValue('general/test/test', $storeScope)
        ];
        print_r($data);exit;
    }
}
