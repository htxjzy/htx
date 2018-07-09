<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index,follow" />
<?php if(is_home()){ ?>
<title><?php echo get_option('home_title_name'); ?></title>
<meta name="keywords" content="<?php echo get_option('home_keywords_name'); ?>" />
<meta name="description" content="<?php echo get_option('home_description_name'); ?>"/> 
<?php } elseif(is_post_type_archive('information')) { ?> 
<title><?php echo get_option('m2ti_name'); ?></title>
<meta name="keywords" content="<?php echo get_option('m2k_name'); ?>" />
<meta name="description" content="<?php echo get_option('m2s_name'); ?>"/> 
<?php } elseif(is_post_type_archive('baosheng')) { ?> 
<title><?php the_title(); ?></title>
<meta name="keywords" content="<?php echo esc_html( get_post_meta($post->ID,'mspc_keywords',true)); ?>" />
<meta name="description" content="<?php  echo excerptexcerpt(200); ?>"/>
<?php } else { ?> 
<title><?php the_title(); ?></title>
<meta name="keywords" content="<?php echo esc_html( get_post_meta(get_the_ID(),'page2_keywords',true)); ?>" />
<meta name="description" content="<?php  echo esc_html( get_post_meta($post->ID,'page2_description',true)); ?>"/>
<?php } ?> 
<link href="/m/css/bootstrap.min.css" rel="stylesheet">
<link href="/m/css/animate.min.css" rel="stylesheet">
<link href="/m/css/mstyle.css" rel="stylesheet">
<link rel="icon" href="/m/images/icon.png" type="image/x-icon" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/m/js/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container-fluid">
<header class="yapiskan">
<div class="row">
    <div class="col-xs-3"><a class="al" href="/baosheng/menu"><img alt="宝盛国际" src="/m/images/boxpoint.jpg" /></a></div>
    <div class="col-xs-6"><a class="am" href="/"><img class="img-responsive" alt="宝盛国际" src="/m/images/logo.png" /></a></div>
    <div class="col-xs-3"><a class="ar" href="/baosheng/register" target="_blank"><span>注册</span></a></div>
</div>
</header> 
<script src="/m/js/hammer.min.js"></script>
<script src="/m/js/topnavhidenshow.js"></script><!--//设置滚动时topNav Show or Hiden，Only配合上面的jquery使用-->