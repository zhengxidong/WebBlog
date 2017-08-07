<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/9
 * Time: 2:18
 */

namespace Admin\Controller;
use Think\Controller;

class AboutController extends Controller{
    public function select(){
        $arr = M('info')->select();
        $arr[0]['info_birthday'] = date("Y-m-d",$arr[0]['info_birthday']);
        $this->assign("arr",$arr);
        $this->display();
    }
    public function update(){
        $arr = I('post.');
        if($arr['id']==''){
            unset($arr['submit']);
            unset($arr['id']);
            $bool =M('info')->data($arr)->add();
            if($bool){
                $this->success("更新成功！",U("select"));
            }else{
                $this->error("更新失败！",U("select"));
            }

        }else{
            $data = I('post.');
            unset($data['submit']);
            $data['info_birthday'] = strtotime($data['info_birthday']);
            M('info')->where("id={$data['id']}")->save($data);
            $this->success("更新成功！","select");
        }

    }

    public function aboutblog(){
        $arr = I('post.');
        if(!empty($arr)){
            if($arr['blog_id']==''){
                unset($arr['submit']);
                $bool = D('about_blog')->data($arr)->add();
                if($bool){
                    $this->success("操作成功！",U('About/aboutblog'));
                }else{
                    $this->error("操作失败！",U('About/aboutblog'));
                }
            }else{
                unset($arr['submit']);
                $bool = D('about_blog')->data($arr)->save();
                if($bool){
                    $this->success("操作成功！",U('About/aboutblog'));
                }else{
                    $this->error("操作失败！",U('About/aboutblog'));
                }
            }
        }else{
            $this->assign("list",D('about_blog')->select());
            $this->display();
        }
    }
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}