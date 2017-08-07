<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>资源 - 博客管理系统</title>
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
    <style>
        .pages{width:740px;text-align: center;margin-left:10px }
        .pages a,.pages span {
            display:inline-block;
            padding:2px 5px;
            margin:0 1px 0 3px;
            border:1px solid #f0f0f0;
            -webkit-border-radius:3px;
            -moz-border-radius:3px;
            border-radius:3px;
        }
        .pages a,.pages li {
            display:inline-block;
            list-style: none;
            text-decoration:none; color:#838383;

        }
        .pages a{
            background: #f7f6f1;
        }
        .pages a.first,.pages a.prev,.pages a.next,.pages a.end{
            margin:0;
        }
        .pages a:hover{
            border-color:#50A8E6;
        }
        .pages span.current{
            background:#50A8E6;
            color:#FFF;
            font-weight:700;
            border-color:#50A8E6;
        }
    </style>
</head>

<body class="user-select">
<section class="container-fluid">
  <header>
      <!--加载顶部导航-->
      <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="/">BlogCMS</a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">消息 <span class="badge"></span></a></li>
                <li><a href="<?php echo U('Admin/Album/select');?>" target="_blank">相册 <span class="badge" ></span></a></li>
                <li><a href="<?php echo U('Home/Index/index');?>" target="_blank">去博客 <span class="badge"></span></a></li>
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><a title="查看或修改个人信息" href="<?php echo U('Admin/About/select');?>">个人信息</a></li>
                        <li><a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog">登录记录</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo U('Admin/Login/logout');?>"><i class="fa fa-sign-out"></i>退出</a></li>
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
        <li><a href="<?php echo U('Admin/Message/select');?>">留言管理</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
            <ul class="dropdown-menu" aria-labelledby="otherMenu">
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
        <form action="/Admin/Resources/search" method="post" class="form-inline" role="form">
            <div class="btn-group">
                <select name="resourcestypename" class="form-control selectpicker">
                    <option value="0">请选择分类</option>
                    <?php if(is_array($typelist)): foreach($typelist as $key=>$value): ?><option><?php echo ($value['resourcestypename']); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
            <div class="btn-group">
                <select name="ispublic" class="form-control selectpicker">
                    <option value="2">是否公开</option>
                    <option value="0">是</option>
                    <option value="1">否</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label class="sr-only" for="name">名称</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="请输入名称">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
        <br/>
      <form action="/Comment/checkAll" method="post">
          <ol class="breadcrumb">
              <li><a href="/Admin/Resources/add"><i class="fa fa-plus-square-o"></i>添加资源</a></li>
          </ol>
        <h1 class="page-header">管理 <span class="badge"></span></h1>

          <div style="clear: both;"></div>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">名字</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">分类</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">URL地址</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">密码</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">是否公开</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">时间</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /><?php echo ($value['id']); ?></td>
                <td class="article-title"><?php echo ($value['name']); ?></td>
                <td><?php echo ($value['resourcestypename']); ?></td>
                <td><a href="<?php echo ($value['url']); ?>" target="_blank"><?php echo ($value['url']); ?></a></td>
                <td><?php echo ($value['resourcespw']); ?></td>
                <td><?php if($value['ispublic'] == 0): ?>是<?php else: ?>否<?php endif; ?></td>
                <td><?php echo ($value['resourcesdate']); ?></td>
                <td>
                    <a href="/Admin/Resources/edit/id/<?php echo ($value['id']); ?>"><i class="fa fa-edit"></i></a>
                    <a rel="1" name="delete" onclick="del(<?php echo ($value['id']); ?>)"><i class="fa fa-trash-o"></i></a></td>
              </tr><?php endforeach; endif; ?>
            <script>
                function del(id){
                    if(confirm('确认删除吗')){
                        location.href='/Admin/Resources/delete/id/'+id;
                    }
                    return false;
                }
            </script>
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <div class="btn-toolbar operation" role="toolbar">
              <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
              <div class="btn-group" role="group">
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="删除全部选中" name="checkbox_delete">删除</button>
              </div>
            </div>
            <ul class="pagination pagenav pages">
              <?php echo ($page); ?>
            </ul>
          </nav>
        </footer>
      </form>
    </div>
  </div>
</section>

<script src="/Public/Admin/js/bootstrap.min.js"></script> 
<script src="/Public/Admin/js/admin-scripts.js"></script> 
<script>
/*$(function () {
    $("#main table tbody tr td a").click(function () {
        var name = $(this);
        var id = name.attr("rel"); //对应id   
        if (name.attr("name") === "see") {
            $.ajax({
                type: "POST",
                url: "/Comment/see",
                data: "id=" + id,
                cache: false, //不缓存此页面   
                success: function (data) {
                    var data = JSON.parse(data);
                    $('.see-comment-id').html(data.id);
                    $('.see-comment-page').html(data.page);
                    $('.see-comment-content').html(data.content);
                    $('.see-comment-ip').html(data.ip);
                    $('.see-comment-address').html(data.address);
                    $('.see-comment-system').html(data.system);
                    $('.see-comment-browser').html(data.browser);
                    $('#seeComment').modal('show');
                }
            });
        } else if (name.attr("name") === "delete") {
            if (window.confirm("此操作不可逆，是否确认？")) {
                $.ajax({
                    type: "POST",
                    url: "/Admin/Resources/delete/id/",
                    data: "id=" + id,
                    cache: false, //不缓存此页面   
                    success: function (data) {
                        window.location.reload();
                    }
                });
            };
        };
        return false;
    });
});*/
</script>
</body>
</html>