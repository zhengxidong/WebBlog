<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Request;
use think\Session;
use think\Controller;


/*
* 新浪通过IP地址获取当前地理位置（省份）的接口
* 新浪的接口是,返回json
* http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js
* http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=218.192.3.42
* 参数有两个：format和ip
* 1)IP：不传入ip值时默认为本机ip，也可以指定特定的ip地址；
* 2)format：返回给客户端的数据格式有js和json格式：
*/
// function getSinaAddress($ip){
//    $ipContent   = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip={$ip}");
//    //var_dump($ipContent);
//    //exit;
//    $jsonData = explode("=",$ipContent);
//
//    $jsonAddress = substr($jsonData[1], 0, -1);
//    return $jsonAddress;
// }
function getAddress($ip)
{
   $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
   print_r(file_get_contents($url));
   $ipinfo=json_decode(file_get_contents($url));
   if($ipinfo->code=='1'){
       return false;
   }
   $city = $ipinfo->data->region.$ipinfo->data->city;
   return $city;
}
