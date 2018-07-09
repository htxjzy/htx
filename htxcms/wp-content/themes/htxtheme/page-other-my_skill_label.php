<?php 
/*
Template Name: 我的技能标签
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(3) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
			<div class="htx-box">
                <h3>
                    <b class="bc-red">技能标签设置</b>
                </h3>

                <div class="htx-table">
                    <div class="layui-form">
                        <p class="f16 bc-red fw">
                            1.选择最擅长的一个技能标签，让雇主在搜索服务商时，优先看到您
                        </p>
                        <div class="layui-form-item pt20">
                            <div class="layui-inline">
                                <select name="quiz1">
                                    <option value="">请选择标签</option>
                                    <option value="工程咨询" selected="">工程咨询</option>
                                    <option value="工程造价" selected="">工程造价</option>
                                    <option value="工程施工" selected="">工程施工</option>
                                    <option value="工程招标" selected="">工程招标</option>
                                </select>
                            </div>
                        </div>
                        <p class="f16 bc-red fw">
                            2.选择其他擅长的技能标签，让雇主在搜索服务商对应的各分类时，能够看到您
                        </p>
                        <div class="layui-form-item pt20">
                            <div class="layui-inline">
                                <select name="quiz2">
                                    <option value="">请选择标签</option>
                                    <option value="工程咨询" selected="">工程咨询</option>
                                    <option value="工程造价" selected="">工程造价</option>
                                    <option value="工程施工" selected="">工程施工</option>
                                    <option value="工程招标" selected="">工程招标</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item pt20 text-center">
                            <button type="button" class="buttonmax ">确认修改</button>
                            <a class="open-vip" href="">开通VIP商铺，获得更多的技能标签</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



