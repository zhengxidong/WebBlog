<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/15
 * Time: 22:52
 */

namespace Home\Controller;


use Think\Controller;

class XinqingController extends Controller{
    public function select()
    {
        $dateres = D('process')->field('updatedate')->Order('updatedate desc')->select();
        $this->assign("dateres",$dateres);
        /*$res = D('process')->where($dd)->order('updatedate desc')->select();*/

        /*$this->assign("count",$count);*/
        /*$days = array("");
        $years = array("");
        foreach ($dateres as $value) {
            $date = $value['updatedate'];

            $ar['updatedate'] = array('like', $date);*/
            //$count = D('process')->fidld('updatedate')->where($ar)->select();*/
            //foreach($count as $val) {

            //}
            /*$ok = in_array($date, $days);
            //年
            $year = explode('-', $value['updatedate']);
            $yok = in_array($year[0], $years);

            if (!$yok) {
                array_push($years, $year[0]);

                echo '<h3>' . $year[0] . '</h3>';
            }
            if (!$ok) {
                $dd['updatedate'] = array('like', $date);//条件
                array_push($days, $date);
                echo "<li><span>" . $date . "</span>" .
                    $res = D('process')->where($dd)->order('updatedate desc')->select();
                foreach ($res as $v) {
                    echo "<p><span>" . $v['updatecontent'] . "</span></p>";
                }
                echo "</li>";
            }*/
            $this->display();
        }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}