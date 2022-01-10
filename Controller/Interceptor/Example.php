<?php

namespace Test\Test\Controller\Interceptor;

/**
 * 拦截器
 * https://www.mageplaza.com/magento-2-module-development/magento-2-plugin-interceptor.html
 * https://devdocs.magento.com/guides/v2.4/extension-dev-guide/plugins.html
 */
class Example extends \Magento\Framework\App\Action\Action
{
    protected $title;

    public function execute()
    {
        // echo '111';exit;
        echo $this->setTitle('Welcome');
        echo $this->getTitle();
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
