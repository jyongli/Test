#cron定时任务

#~ MAGENTO START 4e3875b1810a8fa96b16065783c0271a7cbdc16f2fe7a5049f07b3d05209b332
* * * * * /usr/bin/php7.4 /var/www/html/m2/bin/magento cron:run 2>&1 | grep -v "Ran jobs by schedule" >> /var/www/html/m2/var/log/magento.cron.log
0 3 * * * /usr/bin/php7.4 /var/www/html/m2/bin/magento index:reindex &lt;index_type&gt;

* * * * * /usr/bin/php7.4 /var/www/html/m2/bin/magento cron:run
# * * * * * /usr/bin/php7.4 /var/www/html/m2/update/cron.php
# * * * * * /usr/bin/php7.4 /var/www/html/m2/bin/magento setup:cron:run
#~ MAGENTO END 4e3875b1810a8fa96b16065783c0271a7cbdc16f2fe7a5049f07b3d05209b332

#插入定时任务语句：
crontab -u jy -e

#运行cron服务（至少跑两次）：
bin/magento cron:run

#检查现有的 cron 列表：
crontab -l

#验证cron job：
mysql -u jy -p
use m2;
SELECT * from cron_schedule WHERE job_code like '%custom%';


#运行cron job 在Magento自定义组:
bin/magento cron:run --group="custom_crongroup"

#清除缓存：
bin/magento c:c && bin/magento c:f

#cron后台位置
Stores > Configuration > Advanced > System > cron
