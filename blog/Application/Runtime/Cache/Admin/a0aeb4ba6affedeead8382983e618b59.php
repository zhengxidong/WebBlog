<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>常规设置 - 博客管理系统</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="/Public/Admin/images/icon/icon.png">
<link rel="shortcut icon" href="/Public/Admin/images/icon/favicon.ico">
<script src="/Public/Admin/js/jquery-2.1.4.min.js"></script>
<!--[if gte IE 9]>
  <script src="/Public/Admin/js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="/Public/Admin/js/html5shiv.min.js" type="text/javascript"></script>
  <script src="/Public/Admin/js/respond.min.js" type="text/javascript"></script>
  <script src="/Public/Admin/js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script>window.location.href='upgrade-browser.html';</script>
<![endif]-->
</head>

<body class="user-select">
<section class="container-fluid">
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="/">YlsatCMS</a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--加载顶部导航-->
            <ul class="nav navbar-nav navbar-right">
    <li><a href="">消息 <span class="badge"></span></a></li>
    <li><a href="<?php echo U('Admin/Album/select');?>" target="_blank">相册 <span class="badge" ></span></a></li>
    <li><a href="<?php echo U('Home/Index/index');?>" target="_blank">去博客 <span class="badge"></span></a></li>
    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-left">
            <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
            <li><a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog">登录记录</a></li>
        </ul>
    </li>
    <li><a href="<?php echo U('Admin/Login/logout');?>"><i class="fa fa-sign-out"></i>退出登录</a></li>
    <li><a data-toggle="modal" data-target="#WeChat">帮助</a></li>
</ul>
          <form action="" method="post" class="navbar-form navbar-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" autocomplete="off" placeholder="键入关键字搜索" maxlength="15">
              <span class="input-group-btn">
              <button class="btn btn-default" type="submit">搜索</button>
              </span> </div>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <div class="row">
      <!--加载左边导航-->
      <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="active"><a href="<?php echo U('Admin/Index/index');?>">报告</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a href="<?php echo U('Admin/Img/select');?>">封面管理</a></li>
        <li><a href="<?php echo U('Admin/Article/select');?>">文章管理</a></li>
        <li><a href="<?php echo U('Admin/Mood/select');?>">说说管理</a></li>
        <li><a href="<?php echo U('Admin/Tag/select');?>">标签管理</a></li>
        <li><a href="comment.html">评论管理</a></li>
        <li><a data-toggle="tooltip" data-placement="bottom">留言管理</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
            <ul class="dropdown-menu" aria-labelledby="otherMenu">
                <li><a href="<?php echo U('Admin/About/select');?>">关于我</a></li>
                <li><a href="<?php echo U('Admin/About/aboutblog');?>">关于博客</a></li>
                <li><a href="<?php echo U('Admin/Friendlylink/select');?>">友情链接</a></li>
                <li><a href="<?php echo U('Admin/Process/select');?>">网站更新</a></li>
                <li><a href="<?php echo U('Admin/Visitors/select');?>">访问记录</a></li>
            </ul>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">资源管理</a>
            <ul class="dropdown-menu" aria-labelledby="userMenu">
                <li><a href="<?php echo U('Admin/Resources/select');?>">资源管理</a></li>
                <li><a href="<?php echo U('Admin/ResourcesType/select');?>">资源分类管理</a></li>
            </ul>
        </li>
        <li><a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
            <ul class="dropdown-menu" aria-labelledby="settingMenu">
                <li><a href="setting.html">基本设置</a></li>
                <li><a href="readset.html">阅读设置</a></li>
                <li role="separator" class="divider"></li>
                <li><a data-toggle="modal" data-target="#areDeveloping">安全配置</a></li>
            </ul>
        </li>
    </ul>
</aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <form action="/Admin/Friendlylink/update" method="post" autocomplete="off" draggable="false">
            <input type="hidden" name="link_id" value="<?php echo ($arr['link_id']); ?>"/>
          <div class="col-md-9">
            <h1 class="page-header">增加友链</h1>

            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>名字</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="link_name" value="<?php echo ($arr['link_name']); ?>" class="form-control" placeholder="请输入站点副标题" autocomplete="off">
                <span class="prompt-text">用简洁的文字描述本站点。</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>友链（URL）</span></h2>
              <div class="add-article-box-content">
                <input type="text" name="link_url" value="<?php echo ($arr['link_url']); ?>" class="form-control" placeholder="在此处输入站点地址（URL）" required autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>

            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>保存</span></h2>
              <div class="add-article-box-content"> <span class="prompt-text">请确定您对所有选项所做的更改</span> </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">更新</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!--提示模态框-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
      </div>
      <div class="modal-body"> <img src="images/baoman/baoman_01.gif" alt="深思熟虑" />
        <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--右键菜单列表-->
<div id="rightClickMenu">
  <ul class="list-group rightClickMenuList">
    <li class="list-group-item disabled">欢迎访问异清轩博客</li>
    <li class="list-group-item"><span>IP：</span>172.16.10.129</li>
    <li class="list-group-item"><span>地址：</span>河南省郑州市</li>
    <li class="list-group-item"><span>系统：</span>Windows10 </li>
    <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
  </ul>
</div>
<script src="/Public/Admin/js/bootstrap.min.js"></script> 
<script src="/Public/Admin/js/admin-scripts.js"></script>
</body>
</html>