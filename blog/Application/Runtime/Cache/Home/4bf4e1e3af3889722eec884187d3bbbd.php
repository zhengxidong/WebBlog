<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>郑锡东个人博客网站―一个站在后端开发之路的男技术员个人博客网站</title>
<meta name="keywords" content="个人博客,郑锡东个人博客,个人博客模板,郑锡东" />
<meta name="description" content="郑锡东个人博客，是一个站在web前端设计之路的程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<link rel="icon" href="/Public/Home/images/favicon.ico" type="image/icon"/>
<link href="/Public/Home/css/base.css" rel="stylesheet">
<link href="/Public/Home/css/about.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="/Public/Home/js/modernizr.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
    <!--加载导航-->
    <nav class="topnav" id="topnav"><a href="<?php echo U('Home/Index/index');?>"><span>渞頁</span><span class="en">Protal</span></a><a href="<?php echo U('Home/About/about');?>"><span>關於我</span><span class="en">About</span></a><a href="<?php echo U('Home/NewList/newlist');?>"><span>蔓生活</span><span class="en">Life</span></a><a href="<?php echo U('Home/Mood/select');?>"><span>碎言碎語</span><span class="en">Doing</span></a><a href="<?php echo U('Home/Share/share');?>"><span>摸板汾享</span><span class="en">Share</span></a><a href="<?php echo U('Home/Knowledge/knowledge');?>"><span>學海無涯</span><span class="en">Learn</span></a><a href="<?php echo U('Home/Message/add');?>"><span>留言版</span><span class="en">Gustbook</span></a></nav>

</header>
<article class="aboutcon">
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span>
<a href="/" class="n2">关于我</a></h1>
<div class="about left">
  <h2>Just about me</h2>
    <ul> 
     <?php echo (htmlspecialchars_decode($info[0]['info_content'])); ?>
    </ul>
    <h2>About my blog</h2>
    <div class="about_blog">
        <p>域  名：<?php echo ($bloginfo[0]['blog_url']); ?> 创建于2017年04月10日 </p>
        <p>服务器：阿里云服务器</p>
        <p>备案号：<?php echo ($bloginfo[0]['blog_casenumber']); ?></p>
    </div>
</div>
<aside class="right">
    <div class="about_a">
        <img src="/Public/Home/images/test.png" alt="">
    </div>
    <div class="about_c">
    <p>网名：<span>DanceSmile</span> | <?php echo ($info[0]['info_nickname']); ?></p>
    <p>姓名：<?php echo ($info[0]['info_name']); ?> </p>
    <p>生日：<?php echo ($info[0]['info_birthday']); ?></p>
    <p>籍贯：<?php echo ($info[0]['info_nativeplace']); ?></p>
    <p>现居：<?php echo ($info[0]['info_nowliving']); ?></p>
    <p>职业：<?php echo ($info[0]['info_career']); ?></p>
    <p>喜欢的书：<?php echo ($info[0]['info_likebook']); ?></p>
    <p>喜欢的音乐：<?php echo ($info[0]['info_likemusic']); ?></p>
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