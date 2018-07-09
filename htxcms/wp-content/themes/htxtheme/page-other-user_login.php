<?php session_start(); ?>
<?php 
/*
Template Name: 用户登录
*/
?>
<?php
if(is_user_logged_in()){	
	$toUrl=home_url()."/other/user_center";	
	header ("location:{$toUrl}");
}else{	
?>	
<?php
include(TEMPLATEPATH . '/header_logreg.php');	
?>
<link rel="stylesheet" href="/p/css/validatedrag-Page/vdrag.css">
<body>
<header>
    <div class="layui-container layui-clear">
        <div class="fl">
            <a class="fl" href="/">
                <img src="/p/images/logo.png" alt="" style="width:322px; height:98px;" />
            </a>
            <span class="channel">
                用户<br>登录
            </span>
        </div>
        <div class="other_list fr">
            <a class="cooperation" href="/other/help">帮助中心</a>
            <a class="user" href="/other/user_register">注册</a>
            <a class="home" href="/">主页</a>
        </div>
    </div>
</header>

<article class="login-box">
    <div class="layui-container loginptb">
        <div class="login-main fr">
            <div class="login-nav layui-clear login-tab" id="login_btn">
            	<a href="javascript:;" class="active">账号登录</a>
                <a href="javascript:;">快捷登录</a>                
                <a href="javascript:;">扫码登录</a>
            </div>
            <div class="layui-clear">
                <div class="login-center">
                	<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
                    <!--Account login-->
                    <div class="login-log login login_mode">
                        <div class="form-group layui-clear">
                            <label for="EmailOrPhone">账 <span class="ml10">号</span></label>
                            <div class="input-list">
                                <input type="text" class="form-control" name="EmailOrPhone" id="EmailOrPhone" onchange="SignUp.IsEmailOrPhone()" placeholder="您的手机号/邮箱">
                            </div>
                        </div>
                        <div class="form-group layui-clear">
                            <label for="txtPassword">密 <span class="ml10">码</span></label>
                            <div class="input-list">
                                <input type="password" class="form-control" id="txtPassword" onchange="SignUp.CheckPassword()" placeholder="请输入密码">
                            </div>
                        </div>
                        <div id="errordiv" class="form-group layui-clear layui-hide">
                            <div  class="alert alert-danger htx-dismissable  f12" >
                                <i class="layui-icon f12 fw">&#x1006;</i>
                                <span id="errortip"></span>
                            </div>
                        </div>
                        
                        <div id="drag">
        					<div class="drag_bg"></div>
        					<div class="drag_text slidetounlock" onselectstart="return false;" unselectable="on">
            					请按住滑块，拖动到最右边
        					</div>
        					<div class="handler handler_bg"></div>
    					</div>
                        <input type="hidden" name="logRedirect" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                        <div class="form-group layui-clear sub-button" style="padding-bottom:0px">
                            <a href="javascript:;" class="btn bg-red bc-white" onclick="SignUp.CheckPasswordSubmit()">登 录</a>
                        </div>
                    </div>
                    <!--Quick login-->
                    <div class="yzm-login login_mode" style="display:none;">
                        <div class="form-group layui-clear">
                            <label for="phone">手 机 号</label>
                            <div class="input-list">
                                <input type="text" class="form-control" id="phone" onchange="SignUp.CheckQuickPhone()" placeholder="您的手机号">
                            </div>
                        </div>
                        <div class="form-group layui-clear">
                            <label for="yzm">短信验证码</label>
                            <div class="yzm-list">
                                <input type="text" class="form-control w50 fl" id="yzm" onchange="SignUp.CheckQuickCode()" placeholder="请输入验证码">
                                <button id="btnSmsSend" type="button" class="frm_btnCode fr" style="width:100px;" onclick="SignUp.CheckbtnHtxSendQuick()">获取验证码</button>
                            </div>
                        </div>
                        <div id="errordivquick" class="form-group layui-clear layui-hide">
                            <div  class="alert alert-danger htx-dismissable  f12" >
                                <i class="layui-icon f12 fw">&#x1006;</i>
                                <span id="errorquick"></span>
                            </div>
                        </div>
                        <div class="form-group layui-clear sub-button" style="padding-bottom:10px">
                            <a href="javascript:;" class="btn bg-red bc-white" onclick="SignUp.CheckQuickSubmit()">登 录</a>
                        </div>
                    </div>
                    <!--扫一扫登录-->
                    <div class="login-qrcode login_mode" style="display: none;">
                        <h3 class="text-center bc-red">用微信扫一扫 只需1秒即可登录</h3>
                        <div class="yzm-box layui-clear">
                            <!--<div class="qr-img fl">
                                <img src="/p/images/member/erweima.png" alt="二维码" class="img-responsive">
                            </div>
                            <div class="qr-text">
                                <p class="bc-gay">微信扫码登录</p>
                                <p class="bc-gay">安全快捷！</p>
                                <p class=""><a class="bc-blue" href="javascript:;">[刷新二维码]</a> </p>
                            </div>-->
                             <p style="text-align:center; margin-top:5%;">功能建设中，敬请期待...</p>
                        </div>
                    </div>
                </div>
            </div>
                       <div class="form-group layui-clear" style="margin-bottom:10px;">
                            <span class="fl ">如不是会员，则<a class="ml5 bc-blue" rel="nofollow" href="/other/user_register">注册</a></span>
                            <a class="fr bc-blue" href="/other/user_request_pwd">忘记密码？</a>
                        </div>
                        <div class="form-group layui-clear">
                            <span class="fl other-login">或者用合作账号登录：</span>
                            <div class="login-hezuo fl">
<?php 
$url=home_url()."/other/third_login";
$nonce= wp_create_nonce('htxthird');
?>
                                <a href="<?php echo $url; ?>?_htxnonce=<?php echo $nonce; ?>" title="用QQ登录" class="icoqq"></a>
                                <!--<a href="#" class="icosina"></a>-->
                            </div>
                        </div>
            <!--放在这里-->
        </div>
    </div>
</article>
<script src="/p/js/validatedrag/vdrag.js"></script>
<script>
    $('#drag').drag();
</script>
<?php include(TEMPLATEPATH . '/footer_logreg.php'); ?>
<?php } ?>