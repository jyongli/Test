<?php

namespace Test\Test\Cron;

use \Psr\Log\LoggerInterface;

/**
 * cron定时任务
 */
class TestCronModel
{
    protected $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Write to system.log
     *
     * @return void
     */
    public function execute()
    {
        /**
         * 定时任务写在这里
         */
        // xxx


        /**
         * 输出执行结果 在/var/log/system.log
         */
        $this->logger->info('测试定时任务运行成功');
    }
}
