<?php
namespace App\Controller;

use Swoole;
use App;

class DemoForm extends Swoole\Controller
{
    function post()
    {
        $this->assign('my_var', 'swoole view');
        $this->display('demo-form/post.tpl.php');
    }
}