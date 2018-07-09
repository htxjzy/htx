<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php include(TEMPLATEPATH . '/h_title_keywords_description.php'); ?>  
<link rel="icon" href="/p/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="/layui/css/layui.css">
<link rel="stylesheet" href="/p/css/animate.min.css">
<link rel="stylesheet" href="/p/css/style.css?ver=1.3">
<link rel="stylesheet" href="/p/css/common.css?ver=1.1">
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="/p/js/jquery.min.js"></script>
<script src="/layui/layui.js"></script>
</head>
<body>
<div class="toolbar">
   <!--<a href="http://dkc.duokebo.com/webchat/chat.aspx?siteid=384725" rel="nofollow" target="_blank" class="toolbar-item toolbar-item-kefu"></a>-->
   <!--<a title="点击加Q聊"  href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzgwMDE1NjMzMV80MzM0MTJfODAwMTU2MzMxXzJf" rel="nofollow" target="_blank" class="toolbar-item toolbar-item-qyqq"></a>-->
   
   <a target="_blank" href="http://wpa.qq.com/msgrd?v=1&uin=2851218873&site=qq&menu=yes" rel="nofollow" class="toolbar-item toolbar-item-qyqq"></a>
   
   <a href="javascript:;" class="toolbar-item toolbar-item-weixin"><span class="toolbar-layer"></span></a>
   <!--<a rel="nofollow" title="点击加Q聊" href="tencent://message/?uin=2213667242&Site=www.xxx.com&Menu=yes" class="toolbar-item toolbar-item-feedback"><span class="toolbar-layer"></span></a>-->
   <a href="javascript:;" class="toolbar-item toolbar-item-app"><span class="toolbar-layer"></span></a>
   <a href="javascript:scroll(0,0)" id="top" class="toolbar-item toolbar-item-top"></a>
</div><!--.toolbar end-->      
<div class="bodywrap layui-fluid">
<div class="header">
<div class="headertop">
  <div class="layui-row">
    <div class="layui-col-xs3">
     <a href="http://www.htxgcw.com" title="返回火天信工程网首页" rel="nofollow">总首页</a><a href="/">首页</a><a href="/savehome.php">收藏</a>
    </div>
    <div class="layui-col-xs9">
     <span>服务热线：400-626-3980</span>
<?php 
include(TEMPLATEPATH . '/loginout.php'); 
?>   
    </div>
  </div>
</div>
<div class="zsht"><a href="http://www.htxgcw.com/staticpage/joining" target="_blank" title="查阅详情"><img src="/p/images/advhz.jpg" /></a></div>
<div class="headermid">
	<div class="layui-row">
        <div class="layui-col-xs3">
         <a href="/" title="返回工程交易版块首页"><img src="/p/images/logo-gc.png" alt="火天信logo" /></a>
        </div>
        <div class="layui-col-xs5">

        </div>
        <div class="layui-col-xs4">
<form class="layui-form sform" method="post" action="/other/search">
  <div class="layui-form-item">   
    <div class="layui-input-inline" style="width:100px; background:#e4e4e4; line-height:38px; text-align:center;">
    <span>找任务</span>
      <!--<select name="dalei" lay-verify="required">
        <option value=""></option>
        <option value="0">找任务做</option>
        <option value="1">找服务商</option>
        <option value="2">找案例</option>
        <option value="3">找地图</option>  
      </select>-->
    </div>   
    <div class="layui-input-inline" style="width:208px;">
    <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>	
      <input type="text" name="skeyword" required  lay-verify="required" placeholder="省/市/标题关键词" autocomplete="off" class="layui-input">
    </div>
    <div class="layui-input-inline" style="width:70px;">
      <!--<button class="layui-btn layui-btn-danger" lay-submit="" lay-filter="formDemo"><i class="layui-icon" style="font-size:18px; color:#fff;">&#xe615;</i>搜索</button>-->
		<input class="layui-btn layui-btn-danger" name="search_submit" id="submitoperator" type="submit" value='搜 索'/>
    </div>    
  </div>
</form>
        </div>
    </div>
</div>

<div class="headerbot">
    <div class="headerbotwrap">
        <ul class="layui-nav" lay-filter="">
          <li class="layui-nav-item"><a href="http://www.htxgcw.com" title="返回火天信工程网首页">总首页</a></li>
          <li class="layui-nav-item"><a href="/">首页</a></li>
          <li class="layui-nav-item">
            <a href="/assignments">需求分类</a>
<?php include(TEMPLATEPATH . '/h_assignmentstax_menu.php'); ?>
          </li>
          <li class="layui-nav-item"><a href="/other/submission">发布需求</a></li>
          <li class="layui-nav-item"><a href="/other/boarding_project" title="发布指定由火天信承接的项目">项目全托</a></li>
          <li class="layui-nav-item"><a href="/assignments">找业务做</a></li>
          <li class="layui-nav-item"><a href="/shops">服务超市</a></li>
          <li class="layui-nav-item"><a href="/experts">专家荟萃</a></li>
          <li class="layui-nav-item"><a href="/other/cases">成功案例</a></li>
          <!--<li class="layui-nav-item"><a href="/help/center">帮助中心</a></li>-->
          <!--<li class="layui-nav-item"><a href="/other/report">资讯报道</a></li>-->
        </ul>
    </div>
</div><!--.headerbot end-->
</div><!--.header end-->

<div class="headerscroll">
<div class="headertopscroll">
  <div class="layui-row">
    <div class="layui-col-xs3">
     <a href="http://www.htxgcw.com" title="返回火天信工程网首页" rel="nofollow">总首页</a><a href="/">首页</a><a href="/savehome.php">收藏</a>
    </div>
    <div class="layui-col-xs9">
     <a href="/experts">专家荟萃</a><a href="/other/cases">成功案例</a><!--<a href="/help/center">帮助中心</a>--><!--<a href="/other/report">资讯报道</a>--><span>服务热线：400-626-3980</span>
<?php include(TEMPLATEPATH . '/loginout.php'); ?>
    </div>
  </div>
</div>
<div class="headermidscroll">
	<div class="layui-row">
        <div class="layui-col-xs2">
         <a href="/" title="返回工程交易版块首页"><img src="/p/images/logo-gc.png" alt="火天信logo" /></a>
        </div>
        <div class="layui-col-xs6">

        <ul class="layui-nav" lay-filter="">
          <li class="layui-nav-item">
            <a href="/assignments">需求分类</a>
<?php include(TEMPLATEPATH . '/h_assignmentstax_menu.php'); ?>
          </li>
          <li class="layui-nav-item"><a href="/other/submission">发布需求</a><img src="/p/images/hot.gif" /></li>
          <li class="layui-nav-item"><a href="/other/boarding_project" title="发布指定由火天信承接的项目">项目全托</a><img src="/p/images/hot.gif" /></li>         
          <li class="layui-nav-item"><a href="/assignments">找业务做</a></li>
          <li class="layui-nav-item"><a href="/shops">服务超市</a></li>          
        </ul>
   
        </div>
        <div class="layui-col-xs4"></div>
    </div>
</div>
</div><!--.headerscroll end-->