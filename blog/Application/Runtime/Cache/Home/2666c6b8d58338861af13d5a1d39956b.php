<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>郑锡东个人博客网站―一个站在后端开发之路的男技术员个人博客网站</title>
<meta name="keywords" content="个人博客,郑锡东个人博客,个人博客模板,郑锡东" />
<meta name="description" content="郑锡东个人博客，是一个站在web前端设计之路的程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<link rel="icon" href="/Public/Home/images/favicon.ico" type="image/icon"/>
<link href="/Public/Home/css/base.css" rel="stylesheet">
<link href="/Public/Home/css/new.css" rel="stylesheet">
<!-- CDN引进字体 -->
<link href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="/Public/Home/js/modernizr.js"></script>
<![endif]-->

</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
    <!--加载导航-->
    <nav class="topnav" id="topnav"><a href="<?php echo U('Home/Index/index');?>"><span>渞頁</span><span class="en">Protal</span></a><a href="<?php echo U('Home/About/about');?>"><span>關於我</span><span class="en">About</span></a><a href="<?php echo U('Home/NewList/newlist');?>"><span>蔓生活</span><span class="en">Life</span></a><a href="<?php echo U('Home/Mood/select');?>"><span>碎言碎語</span><span class="en">Doing</span></a><a href="<?php echo U('Home/Share/share');?>"><span>摸板汾享</span><span class="en">Share</span></a><a href="<?php echo U('Home/Knowledge/knowledge');?>"><span>學海無涯</span><span class="en">Learn</span></a><a href="<?php echo U('Home/Message/add');?>"><span>留言版</span><span class="en">Gustbook</span></a></nav>

</header>
<article class="blogs">
  <h1 class="t_nav"><span>您当前的位置：<a href="/index.html">首页</a>&nbsp;&gt;&nbsp;<a href="/news/s/">慢生活</a>&nbsp;&gt;&nbsp;<a href="/news/s/">文章</a></span><a class="n2">文章</a></h1>
  <div class="left" style="border:1px solid red;position: relative">
    <div class="index_about">
    <h2 class="c_titile"><?php echo ($ar['articletitle']); ?></h2>
    <p class="box_c"><span class="d_time">发布时间：<?php echo ($ar['articletime']); ?></span><span>编辑：郑锡东</span></p>
    <ul class="infos">
        <?php echo (htmlspecialchars_decode($ar['articlecontent'])); ?>
    </ul>
    <div class="keybq">
    <p><span>关键字词</span>：爱情,犯错,原谅,分手</p>
    
    </div>
    <div class="ad"> </div>
    <div class="nextinfo">
        <?php if($prev['id'] == ''): ?><p>没有上一篇了噢！亲</p>
            <?php else: ?>
           <p><i class="fa fa-hand-o-up"></i>上一篇：<a href="/Home/NewList/newdetail/id/<?php echo ($prev['id']); ?>"><?php echo ($prev['articletitle']); ?></a></p><?php endif; ?>
        <?php if($next['id'] == ''): ?><p>没有下一篇了噢！亲</p>
            <?php else: ?>
            <p><i class="fa fa-hand-o-down">下一篇：<a href="/Home/NewList/newdetail/id/<?php echo ($next['id']); ?>"></i><?php echo ($next['articletitle']); ?></a></p><?php endif; ?>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        <li><a href="/news/s/2013-07-25/524.html" title="现在，我相信爱情！">现在，我相信爱情！</a></li>
        <li><a href="/newstalk/mood/2013-07-24/518.html" title="我希望我的爱情是这样的">我希望我的爱情是这样的</a></li>
        <li><a href="/newstalk/mood/2013-07-02/335.html" title="有种情谊，不是爱情，也算不得友情">有种情谊，不是爱情，也算不得友情</a></li>
        <li><a href="/newstalk/mood/2013-07-01/329.html" title="世上最美好的爱情">世上最美好的爱情</a></li>
        <li><a href="/news/read/2013-06-11/213.html" title="爱情没有永远，地老天荒也走不完">爱情没有永远，地老天荒也走不完</a></li>
        <li><a href="/news/s/2013-06-06/24.html" title="爱情的背叛者">爱情的背叛者</a></li>
      </ul>
    </div>
  </div>
    <div style="border:1px solid red;width: 760px;height: 500px;margin: 465px 0 0 10px;">
        <ul id="commentTarget" class="commentlist comdot">

            <li class="comment byuser comment-author-zhw2590582 bypostauthor even thread-even depth-1 clearfix" id="li-comment-22">
                <div class="comment-block" id="comment-22">
                    <div class="author-img"><img src="img/user/358.png" class="avatar avatar-100" width="100" height="100"></div>
                    <div class="comment-body clearfix">
                        <div class="comment-name">
                            <span class="arrow left"></span>
                            <cite class="fn">cfb</cite><span class="fr">50L</span>
                        </div>
                        <div class="comment-text">
                            <p>路过</p>
                        </div>
                        <div class="comment-info clearfix">
<span class="comment-date">
<a class="comment-time" href="javascript:void(0)">2017-04-20 09:41:28</a>
</span>
                            <span class="comment-edit"></span>
                        </div>
                    </div>
                </div>
            </li>
            <li class="comment byuser comment-author-zhw2590582 bypostauthor even thread-even depth-1 clearfix" id="li-comment-22">
                <div class="comment-block" id="comment-22">
                    <div class="author-img"><img src="img/user/146.png" class="avatar avatar-100" width="100" height="100"></div>
                    <div class="comment-body clearfix">
                        <div class="comment-name">
                            <span class="arrow left"></span>
                            <cite class="fn">11</cite><span class="fr">49L</span>
                        </div>
                        <div class="comment-text">
                            <p>111111111111111111111111111111111111111111111你们好奥奇偶if近段时间爱国佛年纪</p>
                        </div>
                        <div class="comment-info clearfix">
<span class="comment-date">
<a class="comment-time" href="javascript:void(0)">2017-04-20 09:26:22</a>
</span>
                            <span class="comment-edit"></span>
                        </div>
                    </div>
                </div>
            </li>
            <div class="clearfix"></div>

        </ul>
    </div>
  </div>
    <!--右边-->
  <aside class="right">
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
    <script type="text/javascript" id="bdshell_js"></script>
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
    <!-- Baidu Button END -->
    <div class="blank"></div>
    <div class="news">
      <div class="news_right">
          <h3>
            <p><span>栏目最新</span></p>
          </h3>
          <ul class="rank">
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="建站流程篇――教你如何快速学会做网站" target="_blank">建站流程篇――教你如何快速学会做网站</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
          </ul>
      </div>
      <div class="news_right news_ph">
          <h3 class="ph">
            <p><span>点击排行</span></p>
          </h3>
          <ul class="paih">
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
            <li><i class="fa fa-bookmark-o"></i><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
          </ul>
      </div>
    </div>
  </aside>
</article>

<!--加载底部-->
<!-- 底部 -->
<footer>
    <p>CopyRight <i class="fa fa-copyright"></i> 2016版权所有 ICP备案号：<a>粤ICP备17046346号</a></p>
</footer>

<script src="/Public/Home/js/silder.js"></script>
</body>
</html>