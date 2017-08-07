<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/8
 * Time: 14:18
 */
/**
 * @param $str
 * @return string
 * 将数据库的文章内容的p实体字符，转换为html标签
 */
function jiexi($str){
    return htmlspecialchars_decode($str);
}
function tihuan($str){
    return str_repeat(array("&lt;p&gt;","","&lt;/p&gt;"),$str);
}
function getCity($ip = '')
{
    if($ip == ''){
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ip=json_decode(file_get_contents($url),true);
        $data = $ip;
    }else{
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));
        if((string)$ip->code=='1'){
            return false;
        }
        $data = (array)$ip->data;
    }

    return $data;
}

