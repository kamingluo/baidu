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

	public function login(Request $request)
	{
		// $data = $request->param();//接收所有传过来的post值
		$name =$request->param("name");
		$password =$request->param("password");
		$dbnum =db('baidu_accounts')->where('name',$name)->where('password',$password)->find();//查询用户信息
		if($dbnum==null){
			$dbreturn=['state'   => '400','message'  => "登录失败" ];
		    return $dbreturn;
		}
	    else{

			$state=['state'   => '200','message'  => "登录成功" ];
			$resdata=array_merge($state,array('userdata'=>$dbnum));
			return $resdata;
		}
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


	//今日点击数
	public function todayclick(Request $request)
	{

		$querytime =$request->param("querytime");

		//今天today，昨天yesterday，本周week,上周last week,本月month,上月last month,本年year,上年last year
		$arr=array("today","yesterday","week","last week","month","last month","year","last year");
		//判断传入的值是否满足,不满足就默认
		$existence=in_array($querytime,$arr);
		
		if($querytime == null || $querytime == "" || !$existence){
			$querytime='today';
		}
		//拿到接口传的用户的id
		$ascription =$request->param("ascription");

		$banner=db('baidu_statistics')->where('ascription',$ascription)->where('adType',"banner")->whereTime('create_time', $querytime)->count();
		$feed=db('baidu_statistics')->where('ascription',$ascription)->where('adType',"feed")->whereTime('create_time', $querytime)->count();
		$bannerdata=db('baidu_statistics')->where('ascription',$ascription)->where('adType',"banner")->whereTime('create_time', $querytime)->field("count(*) as value,appName as name")->group('appName')->select();

		$feeddata=db('baidu_statistics')->where('ascription',$ascription)->where('adType',"feed")->whereTime('create_time', $querytime)->field("count(*) as value,appName as name")->group('appName')->select();

		$data=['banner' => $banner,'feed'  => $feed,'bannerdata'  => $bannerdata,'feeddata'  => $feeddata];

		$state=['state'   => '200','message'  => "ad统计成功",'time'  => $querytime,'existence'  => $existence];
		$resdata=array_merge($state,array('data'=>$data));
		return $resdata;
	}
	

}
