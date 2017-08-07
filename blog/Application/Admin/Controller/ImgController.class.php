<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/30
 * Time: 23:17
 */

namespace Admin\Controller;
use Think\Controller;

class ImgController extends Controller{
    public function select(){
        $this->assign("list",D('img')->select());
        $this->display();
    }
    public function add(){
        $arr = I("post.");
        if(!empty($arr)){
            //上传文章图片
            $up = new \Think\Upload();
            $up->rootPath = "./Public/Upload/aiticleimg/";
            $up->autoSub =false;//取消自动以时间命名的文件夹
            /*$up->saveExt ='.png';*/
            $info = $up->uploadOne($_FILES['picpath']);
            $path = $info['savepath'].$info['savename'];

            //生成缩略图
            $img = new \Think\Image();
            $ypath = $up->rootPath.$path;

            $img->open($ypath);//打开上传的图片
            $newsname = time().uniqid().".png";//新文件名
            $time = date("Y-m-d");
            $pathtime = "./Public/Upload/zoom/".$time;//创建缩略图新路径
            //检测文件夹是否存在，不存在创建
            if(!file_exists($pathtime)){
                mkdir($pathtime,0777);
            }
            //缩略图片并新命名,IMAGE_THUMB_FILLED缩放填充，不填参数，则默认原图等比例缩放
            $img->thumb(175,117,\Think\Image::IMAGE_THUMB_FILLED)->save($pathtime."/".$newsname);
            //生成完缩略图后，删除原图
            if(file_exists($ypath)){
                unlink($ypath);
            }
            unset($arr['submit']);
            //信息入库
            $arr['picpath'] = $time."/".$newsname;
            unset($arr['submit']);
            $bool = D('img')->data($arr)->add();
            if($bool){
                $this->success("操作成功！",U('Img/select'));
            }
            else{
                $this->error("操作失败！",U('Img/select'));
            }
        }else{
            $this->display();
        }
    }
    public function delete($id){
        $data['id'] = $id;
        $arr = D('img')->where($data)->find();
        $path = "./Public/Upload/zoom/".$arr['picpath'];
        if(file_exists($path)){
            unlink($path);
        }
        $bool = D('img')->where($data)->delete();
        if($bool){
            $this->success("操作成功！",U('Img/select'));
        }else{
            $this->error("操作失败！",U('Img/select'));
        }
    }
}