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
    <style>
        .table{width: 100%;
        max-width: 100%;
            margin-bottom: 20px;background-color: transparent;border-spacing: 0;
            border-collapse: collapse;}
        .bt{padding-top: 8px;
        padding-bottom: 8px;
            color: #777;
            text-align: left;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
        }
        .h{vertical-align: bottom;
        border-bottom: 2px solid #ddd;box-sizing: border-box;text-align: center;}
        .dy{padding: 8px;
        line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
            text-align: center;
        }
        .nr{vertical-align: bottom;
            border-bottom: 1px solid #ddd;box-sizing: border-box;}
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
<body>
<header>
  <div id="logo"><a href="/"></a></div>
    <!--加载导航-->
    <nav class="topnav" id="topnav"><a href="<?php echo U('Home/Index/index');?>"><span>渞頁</span><span class="en">Protal</span></a><a href="<?php echo U('Home/About/about');?>"><span>關於我</span><span class="en">About</span></a><a href="<?php echo U('Home/NewList/newlist');?>"><span>蔓生活</span><span class="en">Life</span></a><a href="<?php echo U('Home/Mood/select');?>"><span>碎言碎語</span><span class="en">Doing</span></a><a href="<?php echo U('Home/Share/share');?>"><span>摸板汾享</span><span class="en">Share</span></a><a href="<?php echo U('Home/Knowledge/knowledge');?>"><span>學海無涯</span><span class="en">Learn</span></a><a href="<?php echo U('Home/Message/add');?>"><span>留言版</span><span class="en">Gustbook</span></a></nav>

</header>
<article class="aboutcon">
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span>
<a href="/" class="n2">资源</a></h1>
<div class="about left">
  <h2>资源分享</h2>
    <ul>
     <table class="table">
        <!-- <caption class="bt">港剧</caption>-->
         <thead>
             <tr class="h">
                 <td>资源名称</td>
                 <td>资源地址</td>
                 <td>密码</td>
             </tr>
         </thead>
         <tbody>
         <?php if(is_array($list)): foreach($list as $key=>$value): ?><tr class="nr">
                     <td class="dy"><?php echo ($value['name']); ?></td>
                     <td class="dy"><a href="<?php echo ($value['url']); ?>" target="_blank"><?php echo ($value['url']); ?></a></td>
                     <td class="dy"><?php echo ($value['resourcespw']); ?></td>
                 </tr><?php endforeach; endif; ?>
         </tbody>
     </table>
        <div class="pages"><?php echo ($page); ?></div>
    </ul>
</div>
<aside class="right">
    <div class="about_c">
        <p>分类</p>
        <p>
            <?php if(is_array($typelist)): foreach($typelist as $key=>$value): ?><span><a href="/Home/Share/serach/id/<?php echo ($value['id']); ?>"><?php echo ($value['resourcestypename']); ?></a></span>|<?php endforeach; endif; ?>
        </p>
    </div>
    <div class="about_c">
    <p><span>有问题请加群</span> |
        <p><a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=251310f0dee545fd5d216448f61429313a8686a9d87f2b2c7fa7188df9a0a63f"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="PHP技术交流" title="PHP技术交流"></a></p>
        <img src="/Public/Home/images/1494331558464.png" alt="PHP技术交流" width="190" height="190"/>
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