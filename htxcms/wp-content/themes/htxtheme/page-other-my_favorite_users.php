<?php 
/*
Template Name: 用户收藏
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
	$(".layui-main .layui-clear > .user-left > ul li.c-collect dl dd:nth-child(2) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">

<div class="htx-box">
                <h3>
                    <b class="bc-red">用户收藏</b>
                </h3>
                <div class="list_box">
                     <div class="list_li">
                         <strong>任务类型：</strong>
                         <a class="cur" href="javascript:;">商铺</a>
                         <a href="javascript:;">雇主</a>
                         <a href="javascript:;">专家</a>
                     </div>
                    <div class="list_li">
                        <strong>收藏时间：</strong>
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
                    <table  class="layui-table"  lay-skin="nob">
                        <colgroup>
                            <col width="45%">
                            <col width="15%">
                            <col width="25%">

                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>头像/名称/地区</th>
                            <th>用户类型</th>
                            <th>收藏时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td>
                                    <div class="head-box layui-clear">
                                        <em>
                                            <img src="" alt="" class="img-responsive">
                                        </em>
                                        <span class="user_collection_name">广西梦之光文化传媒有限公司</span>
                                        <span class="user_collection_address">广西 - 南宁市 - 青秀区</span>
                                    </div>
                                </td>
                                <td>商铺</td>
                                 <td>2017-07-27 14:40:56</td>
                                 <td>
                                     <a class="layui-btn layui-btn-small layui-btn-warm" href="javascript:;">删除</a>
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



