<?php 
/*
Template Name: 工具使用记录
*/
?>
<?php
if(!is_user_logged_in()){	
	echo "请先登录";
}else{
?>		
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
    <div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_center_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(1)").addClass("cur");
	$(".layui-main .layui-clear > .user-left > ul li.c-tools dl dd:nth-child(3) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">

			<div class="htx-box">
                <h3>
                    <b class="bc-red">工具使用记录</b>
                </h3>
                <div class="list_box">
                     <div class="list_li">
                         <strong>工具类型：</strong>
                         <a class="cur" href="javascript:;">所有</a>
                         <a href="javascript:;">稿件隐藏</a>
                         <a href="javascript:;">火天信诚信宝</a>
                         <a href="javascript:;">火天信服务通</a>
                         <a href="javascript:;">首页轮播广告位</a>
                         <a href="javascript:;">旺铺升级版</a>
                         <a href="javascript:;">旺铺专业版</a>
                     </div>
                    <div class="list_li">
                        <strong>工具类型：</strong>
                        <a class="cur" href="javascript:;">全部</a>
                        <a href="javascript:;">近三个月</a>
                        <a href="javascript:;">近半年</a>
                        <a href="javascript:;">近一年</a>
                        <div class="layui-inline">
                            <input type="text" class="layui-input" id="start_time">
                        </div>
                        <span>-</span>
                        <div class="layui-inline">
                            <input type="text" class="layui-input" id="end_time">
                        </div>
                    </div>
                </div>
                <div class="htx-table">
                    <table class="layui-table"  lay-skin="nob">
                        <colgroup>
                            <col width="35%">
                            <col width="25%">
                            <col width="20%">
                            <col width="20%">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>头像/名称</th>
                            <th>任务标题</th>
                            <th>稿件ID</th>
                            <th>使用时间</th>
                        </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td>
                                    <div class="head-box layui-clear">
                                        <em>
                                            <img src="" alt="" class="img-responsive">
                                        </em>
                                        <span class="record">张爱芳</span>
                                    </div>
                                </td>
                                <td>商铺动画制作</td>
                                <td>eiee1478782</td>
                                <td>2017-07-27  14:40:56</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div class="layui-none-information">
                                        <i></i>
                                        <span>暂时没有信息</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>						         
															            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



