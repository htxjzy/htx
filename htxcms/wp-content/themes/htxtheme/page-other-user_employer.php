<?php 
/*
Template Name: 雇主信息设置
*/
?>	
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->
<article class="layui-main">
<?php 
include(TEMPLATEPATH . '/p_user_menu.php'); 
if(is_user_logged_in()){	
	$cur_user = $current_user->ID;
	$userObj = get_userdata($cur_user);	
}
?>
<!--custom_user_openid in www.htxgcw.com-->
    <!--用户中心导航 end-->
    <div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_center_sidebar.php'); ?>
        </div>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(1)").addClass("cur");
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(2) dl dd:nth-child(1) a").addClass("active");
});
</script>
        <!--左边 end-->
        <div class="user-right" style="padding:0 30px;">
            <div class="htx-box htx-box-setting">
                <h3>
                    <b class="">雇主信息</b>
                </h3>
                <div class="basic-box layui-form" id="htx_exp_form">
                    <div class="layui-form-item">
                        <div class="layui-inline ">
                            <label class="layui-form-label ">昵称：</label>
                            <div class="layui-input-inline w300">
                                    <input type="text" name="username" value="<?php echo $nickname = $userObj->nickname; ?>" lay-verify="required|phone" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline ">
                            <label class="layui-form-label ">当前头像：</label>
                            <div class="layui-input-inline w300">
                                <em>
                                    <img src="/p/images/member/tx.png" alt="头像">
                                    <a href="javascript:;" style="position:relative; top:20px;">修改头像</a>
                                </em>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        
                            <label class="layui-form-label "> 雇主简介：</label>
                           	<div class="layui-input-block">
<textarea placeholder="请介绍一下自己，以及经常外包的工程项目" class="layui-textarea"></textarea>
                            </div>
    
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block save-setting">
                            <button class="layui-btn" lay-submit="" lay-filter="accountSetFormSubmit">保存设置</button>
                        </div>
                    </div>
                </div>
<script type="text/javascript" src="/p/js/user_account_set.js?ver=1.0"></script>
            </div>
        </div>
    </div>    
</article>
<?php get_footer(); ?>
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


