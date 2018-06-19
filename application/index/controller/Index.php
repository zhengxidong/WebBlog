<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;
use app\index\model\Article as ArticleModel;
use app\index\model\Cate as CateModel;
use app\manage\model\AccessRecords as AccessRecordsModel;
class Index extends Controller
{
    public function index()
    {

        //测试获取地理位置
        //print_r(getCity("123.125.71.73"));
        //var_dump(getAddress('223.211.94.217'));
        //获取所有文章数据
        //$articleData = Db::table('bg_article')->select();

        //模型操作查询
        //$article = new ArticleModel();
        //$articleList = $article->order('id','desc')->select();
        //$articleList = ArticleModel::all();
        //存储访问记录ip地址
        $request = Request::instance();
        $ip = $request->ip(0,true);
        if(!empty($ip))
        {
          $ipInfo = getAddress($ip);

          if($ipInfo)
          {
            if(!empty($ipInfo->area))
            {
              $area = $ipInfo->area; //区
            }
            if(!empty($ipInfo->county))
            {
                $area = $ipInfo->county;   //县
            }
            $accessRecords = new AccessRecordsModel;
            $accessRecords->ip            = $ip;
            $accessRecords->article_id    = null;
            $accessRecords->country_name  = (!empty($ipInfo->country)) ? $ipInfo->country : null;
            $accessRecords->province_name = (!empty($ipInfo->region)) ? $ipInfo->region : null;
            $accessRecords->city_name     = (!empty($ipInfo->city)) ? $ipInfo->city : null;
            $accessRecords->area_name     = (!empty($area)) ? $area : null;
            $accessRecords->access_time   = date("Y-m-d H:i:s");
            $accessRecords->access_date   = date("Y-m-d");
            $accessRecords->save();
          }

        }

        //链式操作联合查询
        $articleList = Db::table('bg_article')
          ->alias('a')
          ->join('bg_cate c','c.cate_id = a.cate_id')
          ->where("a.article_status ='open'")
          ->order('id','desc')
          ->select();

      $this->assign('articleList',$articleList);

      //获取栏目
      $cate = new CateModel();
      $cateList = $cate->order('cate_id','asc')->select();
      $this->assign('cateList',$cateList);
      return $this->view->fetch();
    }
    public function article_details($id)
    {
      //获取栏目列表
      $cate = new CateModel();
      $cateList = $cate->order('cate_id','asc')->select();
      $this->assign('cateList',$cateList);

      $articleInfo = ArticleModel::get($id);

      $cateInfo = CateModel::get($articleInfo->cate_id);
      $this->assign('cate_name',$cateInfo->cate_name);

      $this->assign('articleInfo',$articleInfo);

      //文章访问量
      $request = Request::instance();
      $expire = 24 * 60 * 60;
      $ip = $request->ip(0,true);
      $newIp = str_replace('.','_',$ip);
      $name = $newIp.'_'.$id;

      if(!Cookie::has($name,'views_'))
      {
        //没有访问量过，则数据库文章访问量加1
        $articleViews = $articleInfo->article_views + 1;
        $value = $articleViews;
        Cookie::set($name,$value,['prefix'=>'views_','expire'=>$expire]);

        $articleInfo->article_views = $articleViews;
        $articleInfo->save();
        //浏览量
        $this->assign('articleViews',$articleViews);
      }
      else
      {
        $value = Cookie::get($name,'views_');
        $this->assign('articleViews',$value);
      }

      //访问记录
      if(!empty($ip))
      {
        $ipInfo = getAddress($ip);
        if($ipInfo)
        {
          if(!empty($ipInfo->area))
          {
            $area = $ipInfo->area; //区
          }
          if(!empty($ipInfo->county))
          {
              $area = $ipInfo->county;   //县
          }
          $accessRecords = new AccessRecordsModel;
          $accessRecords->ip            = $ip;
          $accessRecords->article_id    = $articleInfo->id;
          $accessRecords->article_name  = $articleInfo->article_name;
          $accessRecords->country_name  = (!empty($ipInfo->country)) ? $ipInfo->country : null;
          $accessRecords->province_name = (!empty($ipInfo->region)) ? $ipInfo->region : null;
          $accessRecords->city_name     = (!empty($ipInfo->city)) ? $ipInfo->city : null;
          $accessRecords->area_name     = (!empty($area)) ? $area : null;
          $accessRecords->access_time   = date("Y-m-d H:i:s");
          $accessRecords->access_date   = date("Y-m-d");
          $accessRecords->save();
        }
      }

      $this->assign('articleId',$id);
      //点赞
      $this->assign('articleLike',$articleInfo->article_like);
      //评论
      $this->assign('commentCount',$articleInfo->comment_count);
      //关闭评论
      $this->assign('isOpen',1);
      return $this->view->fetch();
    }
    //文章点赞
    public function like()
    {
      $request = Request::instance();

      if($request->post()['action'] == 'suxing_like')
      {
        $articleId = $request->post()['um_id'];
        //如果cookie中找到，则返回提示
        if($request->ip())
        {
          $expire = 24 * 60 * 60;
          $ip = str_replace('.','_',$request->ip());
          $name = $ip.'_'.$articleId;
          if(!Cookie::has($name,'like_'))
          {
            Cookie::set($name,$name,['prefix'=>'like_','expire'=>$expire]);
            $articleInfo = ArticleModel::get($articleId);
            if(!empty($articleInfo))
            {
              $likeCount = $articleInfo->article_like + 1;
              $articleInfo->article_like = $likeCount;
              $articleInfo->save();
            }
            return json($likeCount);
          }
          else
          {

            return json(['error'=>'1']);
          }
        }

      }

    }
}
