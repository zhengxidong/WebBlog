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

//标签选中
function tag($articleForTagList,$tagList){
    //$tagList为所有标签
    foreach($tagList as $value){
        $booldata =true;
        //$articleForTagList为文章所拥有的标签
        foreach($articleForTagList as $va){
            if($va['tag_id']==$value['id']){
                $booldata = false;
                echo '<label class="checkbox-inline"><input type="checkbox" name="tagId[]" value="'.$value['id'].'" checked><span>'.$value['tag_name'].'</span></label>';

            }
        }
        if($booldata) {

          echo '<label class="checkbox-inline"><input type="checkbox" name="tagId[]" value="'.$value['id'].'"><span>'.$value['tag_name'].'</span></label>';

        }
    }

}

//随机获取颜色
function randColor(){
    $colors = array();
    for($i = 0;$i<6;$i++){
        $colors[] = dechex(rand(0,15));
    }
    return implode('',$colors);

}

/**
 * RGB转 十六进制
 * @param $rgb RGB颜色的字符串 如：rgb(255,255,255);
 * @return string 十六进制颜色值 如：#FFFFFF
 */
function RGBToHex($rgb){
    $regexp = "/^rgb\(([0-9]{0,3})\,\s*([0-9]{0,3})\,\s*([0-9]{0,3})\)/";
    $re = preg_match($regexp, $rgb, $match);
    $re = array_shift($match);
    $hexColor = "#";
    $hex = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F');
    for ($i = 0; $i < 3; $i++) {
        $r = null;
        $c = $match[$i];
        $hexAr = array();
        while ($c > 16) {
            $r = $c % 16;
            $c = ($c / 16) >> 0;
            array_push($hexAr, $hex[$r]);
        }
        array_push($hexAr, $hex[$c]);
        $ret = array_reverse($hexAr);
        $item = implode('', $ret);
        $item = str_pad($item, 2, '0', STR_PAD_LEFT);
        $hexColor .= $item;
    }
    return $hexColor;
}
/**
 * 十六进制 转 RGB
 */
function hex2rgb($hexColor) {
    $color = str_replace('#', '', $hexColor);
    if (strlen($color) > 3) {
        $rgb = array(
            'r' => hexdec(substr($color, 0, 2)),
            'g' => hexdec(substr($color, 2, 2)),
            'b' => hexdec(substr($color, 4, 2))
        );
    } else {
        $color = $hexColor;
        $r = substr($color, 0, 1) . substr($color, 0, 1);
        $g = substr($color, 1, 1) . substr($color, 1, 1);
        $b = substr($color, 2, 1) . substr($color, 2, 1);
        $rgb = array(
            'r' => hexdec($r),
            'g' => hexdec($g),
            'b' => hexdec($b)
        );
    }
    $rgb = implode(',',$rgb);
    return $rgb;
}

function mbSubStr($content)
{
  $content = mb_substr($content,0,175);
  return $content;
}
function getAddress($ip)
{
   if(empty($ip)) return false;
   $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
   //print_r(file_get_contents($url));
   $ipinfo=json_decode(file_get_contents($url));
   if($ipinfo->code=='1'){
       return false;
   }
   //$city = $ipinfo->data->region.$ipinfo->data->city;
   return $ipinfo->data;
}
