<?php
/**
 *
 * 监控项目文件 如果文件有更新则reload app_server
 *
 * php /data/wwwroot/swoole_framework_demo/auto_reload/daemon.php
 *
 */

require __DIR__ . '/src/Swoole/ToolKit/AutoReload.php';

$appServerPid = intval(`ps aux | grep 'app_server.php: master' | grep -v 'grep' | awk -F ' ' '{print $2}'`);
if (!empty($appServerPid)) {
    echo 'START......AUTO_RELOAD......APP_SERVER_PID:[' . $appServerPid . ']'."\n";
    $kit = new Swoole\ToolKit\AutoReload($appServerPid);
    $kit->watch(__DIR__ . '/../..');
    $kit->run();
} else {
    echo 'Not Found app_server.php';
}


