<?php 
/*
Template Name: 我修改密码
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(2)").addClass("cur");
});
</script>
    <!--用户中心导航 end-->
    <div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_account_setting_sidebar.php'); ?>
        </div>
<script>
$(function(){
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(2) > a.set4").addClass("curA");	
});
</script>
<style>
a.updatingPWD{ display:block; margin:100px auto 0px auto; width:160px; height:42px; line-height:42px; text-align:center; color:#fff; background:#e4393c; border-radius:6px; }
a.updatingPWD:hover{ color:#fff; background:#dd0b19; }
</style>
        <!--左边 end-->
        <div class="user-right" style="padding:0 30px;">
            <div class="htx-box htx-box-update-pwd">
<a class="updatingPWD" href="/other/user_request_pwd" title="点击去修改" target="_blank">我要修改密码</a>

            </div>
        </div>
    </div>    
</article>
<?php include TEMPLATEPATH . '/footer.php'; ?>
<?php if(!is_user_logged_in()){ ?>
<script>	
layui.use('layer', function(){ 
		var $ = layui.$ 
		,layer = layui.layer;

		//layer.close(layer.index);
		layer.closeAll();
		layer.open({
			title: false,
			type: 1,
			content: $('#login-htx'),
			area: ['530px', '475px']
			,cancel: function(){ 
    			location.reload();
  			}			
		});				
});
</script>
<?php } ?>	
