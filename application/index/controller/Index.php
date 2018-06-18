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
        //获取所有文章数据
        //$articleData = Db::table('bg_article')->select();

        //模型操作查询
        //$article = new ArticleModel();
        //$articleList = $article->order('id','desc')->select();
        //$articleList = ArticleModel::all();
        //存储访问记录ip地址
        $request = Request::instance();
        if(!empty($request->ip()))
        {
          $ipInfo = getIpLookup($request->ip());

          if($ipInfo)
          {
            $accessRecords = new AccessRecordsModel;
            $accessRecords->ip            = $request->ip();
            $accessRecords->article_id    = null;
            $accessRecords->country_name  = $ipInfo->country;
            $accessRecords->province_name = $ipInfo->province;
            $accessRecords->city_name     = $ipInfo->city;
            $accessRecords->area_name     = $ipInfo->district;
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
       //var_dump($articleInfo);
       //exit;
      //获取文章数据
        //$article_Details = Db::table('bg_article')->select();
        //var_dump($article_Details);
        //exit;
        $this->assign('articleInfo',$articleInfo);

        //文章访问量
        $request = Request::instance();
        $request->ip();
        $expire = 24 * 60 * 60;
        $ip = str_replace('.','_',$request->ip());
        $name = $ip.'_'.$id;
        //$name = '127_0_0_1'.'_'.$id;
        //var_dump($_COOKIE);
//Cookie::init(['prefix'=>'think_','expire'=>$expire,'path'=>'/']);
        //var_dump(Cookie::get($name,'views_'));
        if(!Cookie::has($name,'views_'))
        {
          //没有访问量过，则数据库文章访问量加1
          //var_dump(Cookie::set($name,$name,$expire));
          //Cookie::set($name,$name,$expire);
          Cookie::set($name,$name,['prefix'=>'views_','expire'=>$expire]);
          //setcookie($name,$name,$expire);
          $articleInfo->article_views = $articleInfo->article_views + 1;
          $articleInfo->save();
        }

        $this->assign('articleId',$id);
        //$test = 0;
        //$articleInfo->article_like
        $this->assign('articleLike',$articleInfo->article_like);
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
