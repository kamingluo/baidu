<?php
namespace app\miniapp\controller\Statistics;
use think\Db;
use think\Request;
use think\Config;
use think\Exception;

class Baiduad
{
	public function index()
	{

		return  "广告统计模块" ;
	}
	

	public function clickad(Request $request)
	{

		$data = $request->param();//接收所有传过来的post值
		$appId=$data["appid"];
		$appName=$data["appname"];
		$adId=$data["adid"];
		$adType=$data["adtype"];
		$ascription=$data["ascription"];
		$time =date('Y-m-d H:i:s',time());//获取当前时间

		$datares = ['id'=>'','appId' =>$appId,'appName' =>$appName,'adId' =>$adId,'adType' =>$adType,'ascription' => $ascription,'create_time' =>$time];
        $insdata=db('baidu_statistics')->insert($datares);
		$resdata=['state'   => '200','message'  => "ad统计成功"];
		return $resdata;
	}
	

}
