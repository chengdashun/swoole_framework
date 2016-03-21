<?php
define('DEBUG', 'on');
define("WEBPATH", realpath(__DIR__.'/../'));
require __DIR__ . '/../libs/lib_config.php';
//require __DIR__'/phar://swoole.phar';
Swoole\Config::$debug = false;

class EchoServer extends Swoole\Protocol\Base
{
    function onReceive($server, $client_id, $from_id, $data)
    {
        $this->server->send($client_id, "Swoole: " . $data);
    }
}

//设置PID文件的存储路径
Swoole\Network\Server::setPidFile(__DIR__ . '/echo_server.pid');

/**
 * 显示Usage界面
 * php app_server.php start|stop|reload
 */
Swoole\Network\Server::start(function ()
{
    $AppSvr = new EchoServer();
    $server = Swoole\Network\Server::autoCreate('0.0.0.0', 9505);
    $server->setProtocol($AppSvr);
    $server->run(array('worker_num' => 1));
});
