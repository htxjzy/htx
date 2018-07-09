<?php 
/*
Template Name: 账户设置
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(1) > a.set1").addClass("curA");	
});
</script>
        <!--左边 end-->
        <div class="user-right" style="padding:0 30px;">
            <div class="htx-box htx-box-setting">
                <h3>
                    <b class="">基本设置</b>
                </h3>
                <div class="basic-box layui-form">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <input type="hidden" name="userid_auth" value="<?php echo $cur_user; ?>" />
  <input type="hidden" name="account_submit" value="accountSetting" />
                    <div class="layui-form-item">
                        <div class="layui-inline ">
                            <label class="layui-form-label ">用户名：</label>
                                <div class="layui-input-inline w300 get_disabled">
                                    <?php echo $userObj->user_login; ?>
                                </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline ">
                            <label class="layui-form-label ">昵称<span style="color:red; margin-left:4px;">*</span>：</label>
                            <div class="layui-input-inline w300">
                                    <input type="text" name="nick_name" value="<?php echo $nickname = $userObj->nickname; ?>" lay-verify="required|nickName" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline ">
                            <label class="layui-form-label ">当前头像：</label>
                            <div class="layui-input-inline w300">
<?php 
	if(!empty(get_user_meta( $cur_user, 'custom_user_avatar', true ))){
		$avatar_url = get_user_meta( $cur_user, 'custom_user_avatar', true );
	}else{
		$avatar_url = '/p/images/member/tx300grayccc.jpg';
	}
?>
                                <em>
                                    <img style="border-radius:6px; width:137px; height:146px;" id="locaimg" src="<?php echo $avatar_url; ?>" alt="头像">
                                    <a id="img-upload" href="javascript:;">修改头像</a>
                                    <a id="img-default" onclick="userDefaultAvatar()" href="javascript:;">使用默认头像</a>
                                </em>
                                <input type="hidden" name="avatar_upimg"/>
                            </div>
                        </div>
                        <p style="color:#898989; font-size:12px; margin-left:130px; margin-bottom:15px;">注： 上传头像大小必须小于200k，尺寸（长x宽）建议为137x146px 。</p>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline fl">
                            <label class="layui-form-label ">手机号码：</label>
                                <div class="layui-input-inline w300 get_disabled">
                                    <?php echo get_user_meta( $cur_user, 'custom_user_mobile', true ); ?>
                                </div>
                        </div>                      
                        <?php if(empty(get_user_meta( $cur_user, 'custom_user_mobile', true ))) echo '<a class="auth_cat a_auth mobile-auth" href="javascript:;" >绑定手机</a>'; ?>

                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline fl">
                            <label class="layui-form-label "> 电子邮箱：</label>
                            <div class="layui-input-inline w300 get_disabled">
                                <?php echo $userObj->user_email; ?>
                            </div>
                        </div>                        
						<?php if( empty(email_exists( $userObj->user_email ))) echo '<a class="auth_cat a_auth email-auth" href="javascript:;">绑定邮箱</a>'; ?>
                    </div>
                    <div class="layui-form-item">
						<p style="color:#898989; font-size:12px; margin-left:130px; position:relative; top:-5px;">注： 绑定下来的手机或邮箱，原则上不能更改，如确实需要更改，请联系火天信客服。 </p>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline fl">
                            <label class="layui-form-label "> 个性标语：</label>
                            <div class="layui-input-inline w300">
                                <input style="width:650px;" type="text" name="my_slogan" value="<?php echo $userObj->description; ?>" lay-verify="numWords" autocomplete="off" placeholder="" class="layui-input">
                            </div>
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


