<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/29
 * Time: 18:24
 * 访问记录
 */

namespace Admin\Controller;
use Think\Controller;

class VisitorsController extends Controller{
    public function select(){
        $count = D('visitors')->count();
        $Page = getpage($count,20);
        $this->assign("visitors",D('visitors')
            ->Order('ipdate desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select());
        $this->assign("page",$Page->show());
        $this->display();
    }
}