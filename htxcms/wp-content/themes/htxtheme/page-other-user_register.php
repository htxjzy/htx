<?php session_start(); ?>
<?php 
/*
Template Name: 用户注册
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
<body>
<header>
    <div class="layui-container layui-clear">
        <div class="fl">
            <a class="fl" href="#">
                <img src="/p/images/logo.png" alt="" style="width:322px; height:98px;" />
            </a>
            <span class="channel">
                新用户<br>注册
            </span>
        </div>
        <div class="other_list fr">
            <!--<a class="cooperation" href="/other/help">帮助中心</a>-->
            <a class="user" href="/other/user_login">登录</a>
            <a class="home" href="<?php echo home_url(); ?>">主页</a>
        </div>
    </div>
</header>
<article class="login-box">
    <div class="layui-container layui-clear loginptb">
        <div class="login-main fr">
            <div class="login-nav layui-clear reg-tab" id="btn_list">
                <a href="javascript:;" class="active">手机注册</a>
                <a href="javascript:;" >邮箱注册</a>
            </div>
            <div class="layui-clear">
                <div class="login-center">
                  <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
                    <div class="login-log login">
                        <!--手机号注册-->
                        <div class="reg_bnt">
                            <div class="form-group layui-clear">
                                <label>手机号码</label>
                                <div class="input-list">
                                    <input type="text" class="form-control" value="" name="txtiPhone" id="txtiPhone" onchange="SignUp.IsPhone()" placeholder="请输入手机号码">
                                </div>
                            </div>
                            <div class="form-group layui-clear">
                                    <label>密 <span class="ml10">码</span></label>
                                    <div class="input-list">
                                        <input type="password" class="form-control" name="txtPassword" id="txtPassword" onchange="SignUp.CheckPassword();" placeholder="密码必须是6~16位字符和数字组合">
                                    </div>
                            </div>                                     
                            <div class="form-group layui-clear">
                                <label>短信验证码</label>
                                <div class="yzm-list">
                                    <input type="text" class="form-control w50 fl" name="iphoneCodeId" id="iphoneCodeId" onchange="SignUp.CheckCode()" placeholder="请输入验证码">
                                    
                       <button id="btnHtxSend" type="button" class="frm_btn fr" style="line-height:38px; width:100px;" onclick="SignUp.CheckbtnHtxSend()">获取验证码</button>
                                </div>
                            </div>                        
                        </div>
                        <!--邮箱注册-->
                        <div class="reg_bnt"  style="display:none;">
                            <div class="form-group layui-clear">
                                <label>邮<span class="ml10">箱</span></label>
                                <div class="input-list">
                                    <input type="text" class="form-control" value="" name="txtEmail" id="txtEmail" onchange="SignUp.CheckEmail()" placeholder="请输入邮箱">
                                </div>
                            </div>

                             <div class="form-group layui-clear">
                                    <label>密 <span class="ml10">码</span></label>
                                    <div class="input-list">
                                        <input type="password" class="form-control" name="txtPassword2" id="txtPassword2" onchange="SignUp.CheckPassword2();" placeholder="密码必须是6~16位字符和数字组合">
                                    </div>
                             </div>
                       
                            <div class="form-group layui-clear">
                                <label>邮箱验证码</label>
                                <div class="yzm-list">
                                    <input type="text" class="form-control w50 fl" id="txtCode" onchange="SignUp.CheckEmailCode()" placeholder="请输入验证码">
                   <button id="btnSend" type="button" style="line-height:38px; width:100px;" class="frm_btnCode fr"  onclick="SignUp.CheckbtnSend()">获取验证码</button>
                                </div>
                            </div>

                        </div>
                            <div id="errordiv" class="form-group layui-clear layui-hide" >
                                <div  class="alert alert-danger htx-dismissable  f12" >
                                    <i class="layui-icon f12 fw">&#x1006;</i>
                                    <span id="errortip"></span>
                                </div>
                            </div>
                            
                        <div class="layui-form form-group">
                            <div class="layui-inline f12 " >
                                    <input type="checkbox" name="agree" title="" lay-skin="primary" id="agreement" checked  >
                                    <span>我已阅读并同意 <a class="bc-blue" target="_blank" href="/staticpage/agreement">《火天信服务交易平台注册协议》</a></span><br/><span style="padding-top:10px; padding-left:22px;">若已注册，则 <a class="bc-blue" href="/other/user_login">登录</a></span>
                            </div>
                        </div>
						<input type="hidden" name="regRedirect" value="<?php echo $_SERVER['HTTP_REFERER'] ?>">
						<div class="form-group layui-clear sub-button">
                            <input type="button" name="submit"  class="btn bg-red bc-white" value="注 册" id="submit" onclick="SignUp.CheckSubmit()" lay-skin="primary" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<?php include(TEMPLATEPATH . '/footer_logreg.php'); ?>
<?php } ?>