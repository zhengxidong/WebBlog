<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index($id=null){
        if(!empty($id)&&is_numeric($id)){
            $k = new \Home\Model\ArticleModel();
            //记录访问者的ip地址地区及时间
            $getip = get_client_ip();
            $ip = getCity($getip);
            $_SESSION['ip'] = $ip['ip'];
            if($_SESSION['ip']!='')
            {
                if($_SESSION!=$ip['ip']){
                    $visitors['ip'] =$ip['ip'];
                    $visitors['ipdate'] = date("Y-m-d H:i:s");
                    $visitors['address'] = $ip['country'].$ip['region'].$ip['city'];
                    D('visitors')->data($visitors)->add();
                }
            }
            $map['at.tagid'] = $id;
            $map['a.ispublic'] = '0';
            $count = D('article as a')
                ->join("tb_article_tag as at on a.id=at.articleid")
                ->join("tb_tag as t on at.tagid=t.id")
                ->where($map)->count();
            $Page = getpage($count,7);

            $articlelist = D('article as a')
                ->join("tb_article_tag as at on a.id=at.articleid")
                ->join("tb_tag as t on at.tagid=t.id")
                ->where($map)
                ->limit($Page->firstRow.','.$Page->listRows)
                ->field('a.id,a.titlepic,a.articletitle,a.articlecontent,a.articletime,at.articleid,t.name')
                ->select();
            $this->assign("arr",$articlelist);
            $this->assign("page",$Page->show());
            //取出文章与标签的中间表，标签表的数据

            $this->assign("tagarr",D('article_tag as at')->join('tb_tag as t on at.tagid=t.id')->select());
            //点击排行
            $this->assign("ph",D('article')->Order('views desc')->select());
            //最新文章
            $this->assign("zx",D('article')->Order('articletime desc')->select());
            //取出友链
            $this->assign("link",D('friendlylink')->select());
            //取出标签
            $this->assign("tag",D('tag')->select());
            //IP总数
            $data['ip'] = 'ip';
            $this->assign("ip",D('visitors')->where($data)->count('distinct(ip)'));
            //计算访问量
            $counter = intval(file_get_contents("./Public/num.txt"));//将访问量存储到文本
            if(!$_SESSION['www.zxdphp.site']){
                $_SESSION['www.zxdphp.site'] = true;
                $counter++;
                $fp = fopen("./Public/num.txt","w");
                fwrite($fp,$counter);
                fclose($fp);
            }
            $this->assign("num",$counter);

            //本站创建时间
            /*$data = array();
            $site_create_time = strtotime('2017-4-10 00:00:00');
            $days = time()-$site_create_time;
            $data['createtime'] = date("Y-m-d",$site_create_time);
            $data['days'] = $days;
            $this->assign("data",$data);*/
        }
        else{
            $k = new \Home\Model\ArticleModel();
            //记录访问者的ip地址地区及时间
            $getip = get_client_ip();
            $ip = getCity($getip);
            $_SESSION['ip'] = $ip['ip'];
            if($_SESSION['ip']!='')
            {
                if($_SESSION!=$ip['ip']){
                    $visitors['ip'] =$ip['ip'];
                    $visitors['ipdate'] = date("Y-m-d H:i:s");
                    $visitors['address'] = $ip['country'].$ip['region'].$ip['city'];
                    D('visitors')->data($visitors)->add();
                }
            }
            //取出文章
            $count = $k->count();
            $Page = getpage($count,7);
            $this->assign("arr",
                $k->where(array('ispublic'=>'0'))
                    ->Order('articletime desc')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select());
            $this->assign("page",$Page->show());
            //取出文章与标签的中间表，标签表的数据
            $this->assign("tagarr",D('article_tag as at')->join('tb_tag as t on at.tagid=t.id')->select());
            //点击排行
            $this->assign("ph",D('article')->Order('views desc')->select());
            //最新文章
            $this->assign("zx",D('article')->Order('articletime desc')->select());
            //取出友链
            $this->assign("link",D('friendlylink')->select());
            //取出标签
            $this->assign("tag",D('tag')->select());
            //IP总数
            $data['ip'] = 'ip';
            $this->assign("ip",D('visitors')->where($data)->count('distinct(ip)'));
            //计算访问量
            $counter = intval(file_get_contents("./Public/num.txt"));//将访问量存储到文本
            if(!$_SESSION['www.zxdphp.site']){
                $_SESSION['www.zxdphp.site'] = true;
                $counter++;
                $fp = fopen("./Public/num.txt","w");
                fwrite($fp,$counter);
                fclose($fp);
            }
            $this->assign("num",$counter);

            //本站创建时间
            /*$data = array();
            $site_create_time = strtotime('2017-4-10 00:00:00');
            $days = time()-$site_create_time;
            $data['createtime'] = date("Y-m-d",$site_create_time);
            $data['days'] = $days;
            $this->assign("data",$data);*/
        }
        $this->display();
    }
    public function selectarticle(){
        //根据标签查出文章
        /*if(is_numeric($id)){
            $count = D('article as a')
                ->join("tb_article_tag as at on a.id=at.articleid")
                ->join("tb_tag as t on at.tagid=t.id")
                ->where(array('t.id'=>$id))->count();
            $Page = getpage($count,7);

            $articlelist = D('article as a')
                ->join("tb_article_tag as at on a.id=at.articleid")
                ->join("tb_tag as t on at.tagid=t.id")
                ->where(array('t.id'=>$id,'ispublic'=>'0'))
                ->limit($Page->firstRow.','.$Page->listRows)
                ->select();

            $this->assign("arr",$articlelist);
            $this->assign("page",$Page->show());
            $this->display('index');*/
       /* }*/
    }
    public function _empty(){
        /*exit("no this action");*/
        $this->display("Public/View/404.html");
    }
}