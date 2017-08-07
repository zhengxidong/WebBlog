<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/16
 * Time: 16:48
 */
//前台文章时间转换
function sj($str){
    $sj = strtotime($str);
    return date("Y-m-d",$sj);
}
function riqi($str){
    return intval(date("m",$str))."月".intval(date("d",$str))."日";
}
//转换成年
function nian($str){
    return date("Y",$str);
}
//时间轴函数
function sjz($arr){
    $days = array();
    $years = array();
    foreach($arr as $value){
        $date = $value['updatedate'];

        $ok   = in_array( $date,$days );
        //年
        $year = explode('-',$value['updatedate']);
        $yok = in_array($year[0],$years);

        if(!$yok){
            array_push($years,$year[0]);

            echo '<h3>'.$year[0].'</h3>';
        }
        if( !$ok ) {
            $dd['updatedate'] = array('like',$date."%");//查询条件
            array_push($days, $date);
            echo "<li><span>".$date."</span>";
                $res = D('process')->where($dd)->order('updatedate desc')->select();
            foreach($res as $v){
                echo "<p><span>".$v['updatecontent']."</span></p>";
            }
            echo "</li>";
        }
    }
}
//获取浏览器以及版本号
function getbrowser() {
    global $_SERVER;
    $agent  = $_SERVER['HTTP_USER_AGENT'];
    $browser  = '';
    $browser_ver  = '';

    if (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs)) {
        $browser  = 'OmniWeb';
        $browser_ver   = $regs[2];
    }

    if (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $browser  = 'Netscape';
        $browser_ver   = $regs[2];
    }

    if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
        $browser  = 'Safari';
        $browser_ver   = $regs[1];
    }

    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $browser  = 'Internet Explorer';
        $browser_ver   = $regs[1];
    }

    if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $browser  = 'Opera';
        $browser_ver   = $regs[1];
    }

    if (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs)) {
        $browser  = '(Internet Explorer ' .$browser_ver. ') NetCaptor';
        $browser_ver   = $regs[1];
    }

    if (preg_match('/Maxthon/i', $agent, $regs)) {
        $browser  = '(Internet Explorer ' .$browser_ver. ') Maxthon';
        $browser_ver   = '';
    }
    if (preg_match('/360SE/i', $agent, $regs)) {
        $browser       = '(Internet Explorer ' .$browser_ver. ') 360SE';
        $browser_ver   = '';
    }
    if (preg_match('/SE 2.x/i', $agent, $regs)) {
        $browser       = '(Internet Explorer ' .$browser_ver. ') 搜狗';
        $browser_ver   = '';
    }

    if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $browser  = 'FireFox';
        $browser_ver   = $regs[1];
    }

    if (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs)) {
        $browser  = 'Lynx';
        $browser_ver   = $regs[1];
    }

    if(preg_match('/Chrome\/([^\s]+)/i', $agent, $regs)){
        $browser  = 'Chrome';
        $browser_ver   = $regs[1];

    }

    if ($browser != '') {
        return ['browser'=>$browser,'version'=>$browser_ver];
    } else {
        return ['browser'=>'unknow browser','version'=>'unknow browser version'];
    }
}
//计算网站运行天数
function ts($str){
    if(is_numeric($str)){
        $value = array("years" => 0, "days" => 0, "hours" => 0,
            "minutes" => 0, "seconds" => 0,);
        if($str >= 86400){
            $value["days"] = floor($str/86400);
            /*$str = ($str%86400);*/
        }
        return $value["days"];
    }else{
        return false;
    }

}
function wz($article,$tag){
    //$tag为所有标签

    foreach($tag as $value){
        $booldata =true;
        //$article为文章所拥有的标签
        foreach($article as $va){
            if($va['tagid']==$value['id']){
                $booldata =false;
                echo '<input style="margin: 0;" type="checkbox" class="form-control" name="tagid[]" value="'.$value['id'].'" checked><span>'.$value['name'].'</span>';
            }
        }
        if($booldata) {
            echo '<input style="margin: 0;" type="checkbox" class="form-control" name="tagid[]" value="' . $value['id'] . '"><span>' . $value['name'] . '</span>';
        }
    }

}
function getpage($count,$pagesize=10){
    $p = new \Think\Page($count,$pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');

    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}