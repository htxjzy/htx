<?php 
/*
Template Name: 重置密码
*/
session_start();	
?>
<?php
// process form data if $_POST is set
if(!isset( $_POST['htx_nonce_field_name'] )){ 
	echo "非法操作1";
	exit();
}	
//check nonce for security
$nonce = $_POST['htx_nonce_field_name'];
if(!wp_verify_nonce( $nonce, 'htx_nonce_field_id' )){
	echo "非法操作2";
	exit();
}

//Reset the password
if(isset($_POST['txtiPhone']) || isset($_POST['txtEmail']) ){
	
	if(!empty($_POST['txtEmail'])){
		$_SESSION['txtEmail'] = $_POST['txtEmail'];
	}

	if(!empty($_POST['txtiPhone'])){
		$_SESSION['txtiPhone'] = $_POST['txtiPhone'];
	}
	
}
?>
<?php include(TEMPLATEPATH . '/header_forget_pwd.php'); ?>
<body>
<header>
    <div class="layui-container layui-clear">
        <div class="fl">
            <a class="fl" href="/">
                <!--<img src="/p/images/member/logo_login.png" alt="" class="img-responsive">-->
                <img src="/p/images/logo.png" alt="" style="width:296px; height:90px;" >
            </a>
            <span class="channel">
                找回<br>密码
            </span>
        </div>
        <div class="other_list fr">
            <!--<a class="cooperation" href="/other/help">帮助中心</a>
            <a class="user" href="/other/user_register">注册</a>-->
            <a class="home" href="/">主页</a>
        </div>
    </div>
</header>
<article class="main-box">
    <div class="layui-main">
        <div class="get_pwd">
            <div class="box">
                <h3 id="title">重置密码</h3>
                <div class="list">
                        <div class="get_mode_all layui-clear">
                        <!--通过手机或邮箱获得这个用户对应的ID，在该ID记录中修改密码-->
                            <label>新密码：</label>
                            <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
                            <div class="get_mode_input">
                                <input type="password" value="" name="txtPassword" id="txtPassword" class="w274" onchange="SignUp.CheckPassword();" placeholder="密码必须是6~16位字符和数字组合">
                                <span class="bc-red4"></span>
                            </div>
                        </div>
                        <div class="get_mode_all layui-clear">
                            <label>确认密码：</label>
                            <div class="get_mode_input">
                                <input type="password" value="" name="txtPasswordConfirm" id="txtPasswordConfirm" class="w274" onchange="SignUp.CheckPasswordConfirm()" placeholder="密码必须是6~16位字符和数字组合">
                                <span class="bc-red4"></span>
                            </div>
                        </div>
                    <div id="errordiv" class="get_mode_all layui-clear layui-hide">
                        <label></label>
                        <div class="get_mode_input">
                            <div  class="alert alert-danger alert-dismissable w274 fl f14">
                                <i class="layui-icon f14 fw">&#x1006;</i>
                                <span id="errortip"></span>
                            </div>
                        </div>
                    </div>
                        <div class="get_mode_all layui-clear">
                            <a class="sub_btn" href="javascript:;" id="ResetPassword" onclick="SignUp.ResetPassWord()">提交</a>
                        </div>
                </div>

            </div>
        </div>

    </div>
</article>
<?php include(TEMPLATEPATH . '/footer_logreg.php'); ?>