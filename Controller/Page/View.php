<?php

namespace Test\Test\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Result\Page;
/**
 * Send data from controller to phtml
 */
class View extends Action
{
    public function execute()
    {
        /** @var Page $page */
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        /** @var Template $block */
        $block = $page->getLayout()->getBlock('testing.first.layout.example');
        $block->setData('custom_parameter', 'Data from the Controller');
        $block->setData('test', '这是测试模板');
        return $page;
    }
}
