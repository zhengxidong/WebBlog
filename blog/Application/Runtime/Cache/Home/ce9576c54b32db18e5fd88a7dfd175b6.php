<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>郑锡东个人博客网站―一个站在后端开发之路的男技术员个人博客网站</title>
<meta name="keywords" content="个人博客,郑锡东个人博客,个人博客模板,郑锡东" />
<meta name="description" content="郑锡东个人博客，是一个站在web前端设计之路的程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<link href="/Public/Home/css/base.css" rel="stylesheet">
<link href="/Public/Home/css/new.css" rel="stylesheet">
<script src="/Public/Home/js/jquery-1.9.1.min.js"></script>
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
<article class="blogs" >
    <h1 class="t_nav"><span>您当前的位置：<a href="/index.html">首页</a>&nbsp;&gt;&nbsp;<a href="/news/s/">留言板</a>&nbsp;&gt;&nbsp;<a href="/news/s/">留言</a></span><a href="/" class="n2">留言</a></h1>
    <div class="index_about">
    <h2 class="c_titile">留言信箱</h2>
<!--<div class="msgc" style="display: none">
    <div class="keybq" style="">
        <p><span>名字</span><span class="right">L</span></p>
    </div>
    <div class="msgcontent">
        博客不错噢
        <div class="right">2017-4-10 4:50:26</div>
    </div>
</div>-->
    <div class="nextinfo">

    </div>
    <div class="otherlink">
      <h2>发表留言</h2>
        <div class="msg">
            <form id="form">
                <p class="int"><i class="fa fa-user"></i><input type="text" id="name" name="name" placeholder="请输入你的名字"/>&nbsp;&nbsp;
                <i class="fa fa-envelope"></i><input type="text" id="email" name="email" placeholder="博主回复你的通知邮箱"/></p>
                <br/>
                <p><textarea id="content" name="content" placeholder="请留低你个口信喇"></textarea>
                <br/>
                <p><input
                    class="sub" value="发表留言"/></p>
            </form>
        </div>
    </div>
  </div>
    <script>
        $(".msgc").empty();
        //取数据
        $.ajax({
            type: 'POST',
            url: '/Home/Message/getData',
            success: function (data) {
                var result = eval("(" + data + ")");
                /*alert(result);*/
                for (i = 0; i < result.length; i++) {
                    var str = '<div class="msgc">' +
                            '<div class="keybq">' +
                            '<p><span>' + result[i].message_name + '</span><span class="right">' + result[i].message_level+'L'+ '</span></p>' +
                            '</div>' +
                            '<div class="msgcontent">' +
                            result[i].message_content +
                            '<div class="right">' + result[i].message_time + '</div>' +
                            '</div>' +
                            '</div>';
                    $(".c_titile").after(str);
                }
            }
        });
        $("#email").blur(function(){
            /*$("#email").addClass('input[type="text"]');*/
            $("#email").prop("placeholder","博主回复你的通知邮箱");
        });
        $("#email").focus(function(){
            $("#email").css({border:"1px solid #ddd",color:"#867f6f"});
            $("#email").prop("placeholder","");
        });
        //发表评论
        $(".sub").click(function() {
            var message_name = $("#name").val();
            var message_email = $("#email").val();
            var data = /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/;
            if(!data.test(message_email)){
                $("#email").css({border:"1px solid red",color:"red"});
                $("#email").prop("placeholder","请输入正确的邮箱");
            }
            var message_content = $("#content").val();
            $(".sub").val('发送中..').css("cursor", "default");
            $.ajax({
                type: 'POST',
                url: '/Home/Message/addmsg',
                data: {message_name: message_name, message_email: message_email, message_content: message_content},
                success: function (data) {
                    var result = eval("(" + data + ")");
                    /*alert(result);*/
                     $("#name").val("");
                     $("#email").val("");
                     $("#content").val("");
                    for (i = 0; i < result.length; i++) {
                        var str = '<div class="msgc">' +
                                '<div class="keybq">' +
                                '<p><span>' + result[i]['message_name'] + '</span><span class="right">' + result[i]['message_level']+'L'+ '</span></p>' +
                                '</div>' +
                                '<div class="msgcontent">' +
                                result[i]['message_content'] +
                                '<div class="right">' + result[i]['message_time'] + '</div>' +
                                '</div>' +
                                '</div>';
                        /*alert(str);*/
                        $(".c_titile").after(str);
                        $(".sub").val('留言成功！').prop("disabled","disabled");
                    }
                }
            });
        });

    </script>
    <!--右边-->
  <aside class="right">

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