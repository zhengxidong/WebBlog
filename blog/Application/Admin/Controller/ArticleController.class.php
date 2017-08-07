<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 2017/4/7
 * Time: 22:33
 * 文章管理
 */

namespace Admin\Controller;
use Think\Controller;

class ArticleController extends Controller{
    public function select(){
        /*$article = new \Admin\Model\ArticleModel();*/
        /*$list = D('article')->join("tb_article_tag on tb_article_tag.articleid=tb_article.id")
            ->join("tb_tag on tb_tag.id=tb_article_tag.tagid")
            ->field("tb_article.id,tb_article.articletitle,tb_article.ispublic,tb_article.articletime,tb_tag.name")
            ->where('')
            ->select();*/
       $count =D('article')->count();
        $Page = getpage($count,7);
       $list =D('article')
           ->Order('articletime desc')
           ->limit($Page->firstRow.','.$Page->listRows)
           ->select();
        $this->assign("page",$Page->show());
        //取出文章
        $this->assign("article",$list);

        $this->display();
    }
    public function add(){
        $arr = I("post.");
        unset($arr['submit']);
        //上传新的封面
        if(!empty($arr)){
            if(!empty($_FILES['titlepic']['name'])){
                //上传文章图片
                $up = new \Think\Upload();
                $up->rootPath = "./Public/Upload/aiticleimg/";
                $up->autoSub =false;//取消自动以时间命名的文件夹
                /*$up->saveExt ='.png';*/
                $info = $up->uploadOne($_FILES['titlepic']);
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
                $tagarr = $arr['name'];
                unset($arr['name']);
                //文章入库
                $arr['titlepic'] = $time."/".$newsname;
                $arr['articletime'] = date("Y-m-d H:i:s");
                $article = new \Admin\Model\ArticleModel();
                $up = new \Think\Upload();
                $up->upload($arr['titlepic']);
                $bool = $article->data($arr)->add();
                $articleid = mysql_insert_id();
                //标签入库
                foreach($tagarr as $value){
                    $data['articleid'] = $articleid;
                    $data['tagid'] = $value;
                    $tagbool = D('article_tag')->data($data)->add();
                }
                if($bool&&$tagbool){
                    $this->success("发布成功！",U("Article/add"));
                }
            }//选择已有的封面
            else{
                $tagarr = $arr['name'];
                unset($arr['name']);
                //文章入库
                $arr['titlepic'] = $arr['picpath'];//已有封面的路径
                unset($arr['picpath']);
                $arr['articletime'] = date("Y-m-d H:i:s");
                $article = new \Admin\Model\ArticleModel();
                $up = new \Think\Upload();
                $up->upload($arr['titlepic']);
                $bool = $article->data($arr)->add();
                $articleid = mysql_insert_id();
                //标签入库
                foreach($tagarr as $value){
                    $data['articleid'] = $articleid;
                    $data['tagid'] = $value;
                    D('article_tag')->data($data)->add();
                }
                if($bool){
                    $this->success("发布成功！",U("Article/select"));
                }
            }

        }else{
            //取出标签
            $this->assign("tag",D('tag')->select());
            //取出封面
            $this->assign("img",D('img')->select());
            $this->display();
        }

    }
    public function edit($id){
        //取出文章
        $this->assign("list",D('article')->where(array('id'=>$id))->find());
        //查出文章对应所拥有的标签
        $this->assign("taglist",D('article_tag')->where(array('articleid'=>$id))->select());
        //取出所有标签
        $this->assign("tagarr",D('tag')->select());
        $this->display();
    }
    public function update(){
        $arr = I('post.');
        //查出原图片路径
        $yuanpath = D('article')->where(array('id'=>$arr['id']))->field('titlepic')->find();
        $yuantu = "./Public/Upload/zoom/".$yuanpath['titlepic'];
        if(!empty($_FILES['titlepic']['name'])){
            $up = new \Think\Upload();
            $up->autoSub =false;//取消自动以时间命名的文件夹
            $up->rootPath = "./Public/Upload/aiticleimg/";
            $info = $up->uploadOne($_FILES['titlepic']);
            $ypath = $info['savepath'].$info['savename'];

            //生成缩略图
            $img = new \Think\Image();
            $ypath = $up->rootPath.$ypath;

            $img->open($ypath);//打开上传的图片
            $newsname = time().uniqid().".png";//新文件名
            $time = date("Y-m-d");
            $pathtime = "./Public/Upload/zoom/".$time;//创建缩略图新路径
            //检测文件夹是否存在，不存在创建
            if(!file_exists($pathtime)){
                mkdir($pathtime,0777);
            }
            //缩略图片并新命名,IMAGE_THUMB_FILLED缩放填充，不填参数，默认原图等比例缩放
            $img->thumb(175,117,\Think\Image::IMAGE_THUMB_FILLED)->save($pathtime."/".$newsname);
            //生成完缩略图后，删除上传原图
            if(file_exists($ypath)){
                unlink($ypath);
            }
            $arr['titlepic'] = $time."/".$newsname;
            $tag = $arr['tagid'];
            unset($arr['tagid']);
            unset($arr['submit']);
            $arr['articletime'] = date("Y-m-d H:i:s");
            //删除原有的缩略图
            if(file_exists($yuantu)){
                unlink($yuantu);
            }
            //更新文章
            $bool = D('article')->data($arr)->where(array('id'=>$arr['id']))->save();
            //拿出文章已有的标签
            $list = D('article_tag')->where(array('articleid'=>$arr['id']))->select();

            $tagdataz =array();
            foreach($list as $value){
                $tagdataz[] = $value['tagid'];
            }
            $tagdatay =array();
            foreach($tag as $value){
                $tagdatay[] = $value;
            }
            //求差集
            $tagjia = array_diff($tagdatay,$tagdataz);//加

            $tagjian = array_diff($tagdataz,$tagdatay);//减

            if(!empty($tagjia)){
                foreach($tagjia as $value){
                    /*$bool = D('article_tag')->where(array('id'=>$value))->add();*/
                    M()->execute("insert into tb_article_tag values(null,'{$arr['id']}','{$value}')");
                }
            }
            if(!empty($tagjian)){
                foreach($tagjian as $value){
                    M()->execute("delete from tb_article_tag where tagid={$value} and articleid={$arr['roleid']}");
                    /*$bool = D('article_tag')->where(array('id'=>$value))->delete();*/
                }
            }
            if($bool){
                $this->success("操作成功！",U('Article/select'));
            }else{
                $this->error("操作失败！",U('Article/select'));
            }
        }
        //只更新文章信息，不更新图片
        else{
            $tag = $arr['tagid'];
            unset($arr['tagid']);
            unset($arr['submit']);
            $arr['articletime'] = date("Y-m-d H:i:s");

            //更新文章
            $bool = D('article')->data($arr)->where(array('id'=>$arr['id']))->save();
            //拿出文章已有的标签
            $list = D('article_tag')->where(array('articleid'=>$arr['id']))->select();

            $tagdataz =array();
            foreach($list as $value){
                $tagdataz[] = $value['tagid'];
            }
            $tagdatay =array();
            foreach($tag as $value){
                $tagdatay[] = $value;
            }

            //求差集
            $tagjia = array_diff($tagdatay,$tagdataz);//加

            $tagjian = array_diff($tagdataz,$tagdatay);//减

            if(!empty($tagjia)){
                foreach($tagjia as $value){
                    /*$bool = D('article_tag')->where(array('id'=>$value))->add();*/
                    M()->execute("insert into tb_article_tag values(null,'{$arr['id']}','{$value}')");
                }
            }
            if(!empty($tagjian)){
                foreach($tagjian as $value){
                    M()->execute("delete from tb_article_tag where tagid={$value} and articleid={$arr['roleid']}");
                    /*$bool = D('article_tag')->where(array('id'=>$value))->delete();*/
                }
            }
            if($bool){
                $this->success("操作成功！",U('Article/select'));
            }else{
                $this->error("操作失败！",U('Article/select'));
            }
        }
    }
    public function delete($id){
        if(is_numeric($id)){
            /*$yuanpath = D('article')->where(array('id'=>$id))->field('titlepic')->find();*/
            //删除图片
            /*$yuantu = "./Public/Upload/zoom/".$yuanpath['titlepic'];
            if(file_exists($yuantu)){
                unlink($yuantu);
            }*/
            //删除相应的标签
            $tagbool = D('article_tag')->where(array('articleid'=>$id))->delete();
            //删除文章
            $articlebool = D('article')->where(array('id'=>$id))->delete();
            if($articlebool||$tagbool){
                $this->success("操作成功！",U('Article/select'));
            }else{
                $this->error("操作失败！",U('Article/select'));
            }
        }
    }
    //防止空操作
    public function _empty(){
        $this->display("Public/View/404.html");
    }
}