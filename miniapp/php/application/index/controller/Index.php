<?php
namespace app\index\controller;
//use think\log;
use think\Db;

use think\Config;
use think\cache\driver\Redis;

class Index
{
    public function index()
    {
        return "百度小程序统计";
    }

}
