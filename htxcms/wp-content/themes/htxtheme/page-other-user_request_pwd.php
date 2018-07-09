<?php 
/*
Template Name: 找回密码
*/
session_start();
include(TEMPLATEPATH . '/header_forget_pwd.php');	
?>
<body>
<header>
    <div class="layui-container layui-clear">
        <div class="fl">
            <a class="fl" href="/">
               <!-- <img src="/p/images/member/logo_login.png" alt="" class="img-responsive">-->
                <img src="/p/images/logo.png" alt="" style="width:296px; height:90px;" >
            </a>
            <span class="channel">
                找回<br>密码
            </span>
        </div>
        <div class="other_list fr">
            <!--<a class="cooperation" href="/other/help">帮助中心</a>
            <a class="user" href="/other/user_register">注册</a>-->
            <a class="home" href="<?php echo home_url(); ?>">主页</a>
        </div>
    </div>
</header>
<article class="main-box">
    <div class="layui-main">
        <div class="get_pwd">
            <div class="box">
                <h3 id="title">获取手机验证码</h3>
                <div class="list">
                    <div class="get_mode_all layui-clear">
                        <span class="leadership">找回方式：</span>
                        <div class="get_title">
                            <a class="iphone check_iphone active" href="javascript:;">
                                <span>通过手机找回</span>
                                <i></i>
                            </a>
                            <a class="email_pwd email_pwd2 " href="javascript:;">
                                <span>通过邮箱找回</span>
                                <i></i>
                            </a>
                        </div>
                    </div>
                        <!--Get the password back through phone-->
                        <form id="form" name="form"  method="post" action="/other/user_reset_pwd" onSubmit="return SignUp.CheckSubmitForgotPassword()">
                        <!--<form id="form" name="form"  method="post" action="/other/user_reset_pwd">-->
                        <div class="get_type">
                        <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
                            <div class="get_mode_all layui-clear">
                                <label>手机号：</label>
                                <div class="get_mode_input">
                                    <input type="text" value="" name="txtiPhone" id="txtiPhone"  class="w274" onchange="SignUp.IsPhone2()"  placeholder="请输入手机号">
                                    <span class="bc-red4"></span>
                                </div>
                            </div>
                            <div class="get_mode_all layui-clear">
                                <label>短信验证码：</label>
                                <div class="get_mode_input">
                                    <input type="text" value="" name="Code" id="iphoneCodeId" class="w130 mr20" onchange="SignUp.CheckCode()" placeholder="请输入验证码">
                                    <button id="btnHtxSend" type="button" class="get_btn" onclick="SignUp.CheckbtnHtxSend2()">获取验证码</button>
                                    <span class="bc-red4"></span>
                                </div>
                            </div>
                        </div>
                        <!--Get the password back through email-->
                        <div class="get_type" style="display:none;">
                            <div class="get_mode_all layui-clear">
                                <label>Email：</label>
                                <div class="get_mode_input">
                                    <input type="text" value="" name="txtEmail" id="txtEmail" class="w274" onchange="SignUp.CheckEmail2()" placeholder="请输入邮箱">
                                    <span class="bc-red4"></span>
                                </div>
                            </div>
                            <div class="get_mode_all layui-clear">
                                <label>邮箱验证码：</label>
                                <div class="get_mode_input">
                                    <input type="text" value="" name="emailCode" id="txtCode" class="w130 mr20" onchange="SignUp.CheckEmailCode()" placeholder="请输入邮箱验证码">
                                    <button id="btnSend" type="button" class="get_btn" onclick="SignUp.CheckbtnSend2()">获取验证码</button>
                                    <span class="bc-red4"></span>
                                </div>
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
                            <input class="sub_btn" id="submitSignup" name="submitnext" type="submit" value="下一步"/>
                        </div>
                	</form>
                </div>

            </div>
        </div>

    </div>
</article>
<?php include(TEMPLATEPATH . '/footer_logreg.php'); ?>