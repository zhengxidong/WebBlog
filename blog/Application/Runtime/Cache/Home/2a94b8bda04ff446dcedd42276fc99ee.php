<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>郑锡东个人博客网站―一个站在后端开发之路的男技术员个人博客网站</title>
<meta name="keywords" content="个人博客模板,博客模板" />
<meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
<link rel="shortcut icon" href="/blog/Public/Home/images/favicon.ico">
<link href="/blog/Public/Home/css/base.css" rel="stylesheet">
<link href="/blog/Public/Home/css/index.css" rel="stylesheet">
<script src="/blog/Public/Home/js/jquery-1.9.1.min.js"></script>
<!-- CDN引进字体 -->
<link href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="/blog/Public/Home/js/modernizr.js"></script>
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
<body>
<header>
  <div id="logo"><a href="/"></a></div>
    <!--加载导航-->
    <nav class="topnav" id="topnav"><a href="<?php echo U('Home/Index/index');?>"><span>渞頁</span><span class="en">Protal</span></a><a href="<?php echo U('Home/About/about');?>"><span>關於我</span><span class="en">About</span></a><a href="<?php echo U('Home/NewList/newlist');?>"><span>蔓生活</span><span class="en">Life</span></a><a href="<?php echo U('Home/Mood/select');?>"><span>碎言碎語</span><span class="en">Doing</span></a><a href="<?php echo U('Home/Share/share');?>"><span>摸板汾享</span><span class="en">Share</span></a><a href="<?php echo U('Home/Knowledge/knowledge');?>"><span>學海無涯</span><span class="en">Learn</span></a><a href="<?php echo U('Home/Message/add');?>"><span>留言版</span><span class="en">Gustbook</span></a></nav>

</header>
<div class="banner">
  <section class="box" style="position: relative;">
    <div class="texts">
      <p>时间就像流水。</p>
      <p>你永远无法触摸同样的流水两次，因为已经流逝的流水不会再来，</p>
      <p>享受生命的每个当下！</p>
    </div>
    <div class="avatar"><a href="#"><span>郑锡东</span></a> </div>
      <div id="FontScroll" style="
      height: 25px;
      overflow: hidden;background: rgba(0, 204,204, 0.2);
border-radius:3px;;width: 250px;position: absolute;top: 190px;right: 0px;box-shadow: 10px 10px 45px 5px rgba(0, 204,204, 1);">
          <ul>
              <li><a href="" style="color:rgba(0, 204,204, 1)">你现在就处在你人生的阴影里面</a></li>
              <li><a href=''  style="color:rgba(0, 204,204, 1)">但阴影也是你人生中的一部分</a></li>
              <li><a href=''  style="color:rgba(0, 204,204, 1)">你怎么就走不出来呢</a></li>
          </ul>
      </div>
  </section>
</div>
<article>
  <h2 class="title_tj">
    <p class="title_tj_left"><span>文章推荐</span></p>
    <p class="title_tj_right"><a href="<?php echo U('Home/Xinqing/select');?>">心情</a></p>
  </h2>
  <div class="bloglist left">
      <?php if(is_array($arr)): foreach($arr as $key=>$value): ?><div class="blog_left">
      <h3><a href="<?php echo U('Home/NewList/newdetail',array('id'=>$value['id']));?>"><?php echo ($value['articletitle']); ?></a></h3>
      <figure>
          <a href="<?php echo U('Home/NewList/newdetail',array('id'=>$value['id']));?>">
              <img src="/blog/Public/Upload/zoom/<?php echo ($value['titlepic']); ?>">
          </a>
          <div>
              <a href="" class="le"><i class="fa fa-eye"></i>&nbsp;
                  <?php if($value['views'] == 0): else: ?>
                      <?php echo ($value['views']); endif; ?></a>
              <a href="" class="ri"><i class="fa fa-comments-o"></i></a>
          </div>
      </figure>
      <div class="bl_content">
        <div class="blog_content">
          <p><?php echo (htmlspecialchars_decode($value['articlecontent'])); ?></p>
        </div>
        <div class="read_more">
            <a title="阅读更多" href="<?php echo U('Home/NewList/newdetail',array('id'=>$value['id']));?>" target="_blank">阅读更多>></a>
        </div>
      </div>
      <p class="dateview">
          <span><i class="fa fa-clock-o"></i><?php echo (sj($value['articletime'])); ?></span>
          <span><i class="fa fa-bookmark"></i>作者：郑锡东</span>

          <span><i class="fa fa-tags"></i><a href="/news/life/">
              <?php if(is_array($tagarr)): foreach($tagarr as $key=>$va): if($value['id'] == $va['articleid']): echo ($va['name']); ?>&nbsp;&nbsp;&nbsp;
                      <?php else: endif; endforeach; endif; ?>
          </a></span>

          <span class="heart"><a title="Like" href=""><i class="fa fa-heart-o"></i></a></span>
      </p>
    </div><?php endforeach; endif; ?>
      <div class="pages">
          <?php echo ($page); ?>
      </div>
  </div>
  <!-- 右边 -->
  <aside class="right">
   <!-- <div class="weather">
        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=250 height=110 src="//music.163.com/outchain/player?type=0&id=697601210&auto=1&height=90"></iframe>
    </div>-->
    <div class="tag_cloud">
        <h2> 标签云 <span style="color:#3366cc;"></span></h2>
        <div class="taglist" id="tags">
            <?php if(is_array($tag)): foreach($tag as $key=>$value): ?><a  href="<?php echo U('Home/Index/index',array('id'=>$value['id']));?>"><?php echo ($value['name']); ?></a><?php endforeach; endif; ?>
        </div>
    </div>
      <script>
          var tags_a = $("#tags").find("a");
          tags_a.each(function(){
              var x = 10;
              var y = 4;
              var rand = parseInt(Math.random() * (x - y + 1) + y);
              $(this).addClass("size"+rand);
          });
      </script>
      <div style="clear: both"></div>
    <div class="news">
       <div class="blog_right">
        <ul class="tabbtn" id="normaltab">
            <li class="current"><a href="#/jquery/items/">点击排行</a></li>
            <li><a href="#/js/items/">最新文章</a></li>
            <li><a href="#/js/items/">站长统计</a></li>
        </ul><!--tabbtn end-->
        <div class="tabcon" id="normalcon">
                <div class="sublist">
                    <ul>
                        <?php if(is_array($ph)): foreach($ph as $key=>$value): ?><li class="h"><span>▪</span><a href="<?php echo U('Home/NewList/newdetail',array('id'=>$value['id']));?>" target="_blank"><?php echo ($value['articletitle']); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </div><!--tabcon end-->
                <div class="sublist">

                    <ul>
                        <?php if(is_array($zx)): foreach($zx as $key=>$value): ?><li class="h"><span>▪</span><a href="<?php echo U('Home/NewList/newdetail',array('id'=>$value['id']));?>" target="_blank"><?php echo ($value['articletitle']); ?></a></li><?php endforeach; endif; ?>
                    </ul>

                </div><!--tabcon end-->
                <div class="sublist">
                    <ul>
                        <li ><span>▪</span><a href="#" target="_blank">IP:<?php echo ($ip); ?></a></li>

                        <li><span>▪</span><a href="#" target="_blank">访问量:<?php echo ($num); ?></a></li>

                        <li><span>▪</span><a href="#" target="_blank">运行天数:<?php echo (ts($data['days'])); ?>天</a></li>

                        <li><span>▪</span><a href="#" target="_blank">建站时间:<?php echo ($data['createtime']); ?></a></li>

                        <li><span>▪</span><a href="#" target="_blank">最后更新</a></li>
                    </ul>
                </div><!--tabcon end-->
        </div>
    </div>
       <div class="blog_right">
            <h3 class="links">
                <p><span>友情链接</span></p>
            </h3>
            <ul class="website">
                <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["link_url"]); ?>" target="_blank"><?php echo ($vo["link_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

    </div>
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->   
    <a href="/" class="weixin"> </a></aside>
</article>
<!-- 返回顶部 -->
<div id="footer_btn" class="m_hide" style="display: block;">
    <ul>
        <li>
          <a class="qq icon" href="javascript:void(0)">
          <i class="fa fa-qrcode"></i>
          </a>
          <div class="show-box">
              <div class="wx-show footer-show">
              <img src="/blog/Public/Home/images/qrcode.png" class="ajax_gif">
              </div>
          </div>
        </li>
        <li>
            <a href="#totop" class="scrolltotop icon">
            <i class="hand fa fa-chevron-up"></i>
            </a>
        </li>
    </ul>
</div>
<!--加载底部-->
<!-- 底部 -->
<footer>
    <p>CopyRight <i class="fa fa-copyright"></i> 2016版权所有 ICP备案号：<a>粤ICP备17046346号</a></p>
</footer>

<script src="/blog/Public/Home/js/silder.js"></script>
<!--加载文字滚动js-->
<script src="/blog/Public/Home/js/fontscroll.js"></script>

<script type="text/javascript" src="/blog/Public/Home/js/jquery.tabso_yeso.js"></script>
<script type="text/javascript">
    //选项卡
    $("#normaltab").tabso({
        cntSelect:"#normalcon",

        tabEvent:"mouseover",

        tabStyle:"normal"
    });
    //文字滚动
    $(function(){
        $('#FontScroll').FontScroll({time: 3000,num: 1});
    });
    //右边返回顶部和二维码
  $(".qq").mouseover(function(){
     $(".show-box").show();
  }).mouseout(function(){
     $(".show-box").hide();
  });
  $(".show-box").mouseover(function(){
     $(".show-box").show();
  }).mouseout(function(){
     $(".show-box").hide();
  });
  //大于200显示，否则隐藏
  $("#footer_btn").hide();
  $(window).scroll(function(){
   var sc=$(window).scrollTop();
      if(sc>=200){
          $("#footer_btn").fadeIn(1000);
      }
      else{
          $("#footer_btn").fadeOut(1000);
      }
  });
//返回顶部
  $(".scrolltotop").click(function(){
    var sc = $(window).scrollTop();
    $('body,html').animate({scrollTop:0},500);
      return false;
  });
  //大于20固定顶部导航
 /* $("body")[0].onscroll = function(){
      if(document.documentElement.scrollTop>=300){
          $("header").css({position:"fixed",top:"0px",
              width:"1350px",background:"rgba(0,0,0,0.4)",
              boxShadow:"0px 5px 5px rgba(0, 204,204, 1)"});
          $("#topnav").css("color","#fff");
      }else{
          $("header").css({position:"",top:"0px",
              width:"auto",background:"rgba(255,255,255,0.4)",
              boxShadow:""});
          $("#topnav").css("color","");
      }
  }*/
</script>
</body>
</html>