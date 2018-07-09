<link rel="stylesheet" href="/p/css/reglogpop.css?ver=1.0">
<div id="reg-htx" style="display:none">
        <div class="login-main">
        	<h2>注册</h2>
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
                                    
                       <button id="btnHtxSend" type="button" class="frm_btn fr" style="line-height:38px; width:100px; position:relative; right:7px;" onclick="SignUp.CheckbtnHtxSend()">获取验证码</button>
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
                   <button id="btnSend" type="button" style="line-height:38px; width:100px; position:relative; right:7px;" class="frm_btnCode fr"  onclick="SignUp.CheckbtnSend()">获取验证码</button>
                                </div>
                            </div>

                        </div>
                            <div id="errordiv" class="form-group layui-clear layui-hide" style="width:301px; margin-left:103px;">
                                <div  class="alert alert-danger htx-dismissable  f12" >
                                    <i class="layui-icon f12 fw">&#x1006;</i>
                                    <span id="errortip"></span>
                                </div>
                            </div>
                            
                        <div class="layui-form form-group xieyi">
                            <div class="layui-inline f12 " >
                                    <input type="checkbox" name="agree" title="" lay-skin="primary" id="agreement" checked  >
                                    <span>我已阅读并同意 <a class="bc-blue" target="_blank" href="http://www.htxgcw.com/staticpage/agreement">《火天信工程网注册协议》</a></span><span style="padding-top:10px; padding-left:22px;">若已注册，则 <a class="bc-blue loginhtx" href="javascript:;" onclick="loginhtx(this)" >登录</a></span>
                            </div>
                        </div>
						<input type="hidden" name="regRedirect" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
						<div class="form-group layui-clear sub-button" style="width:60%; position:relative; left:79px;">
                            <input type="button" name="submit"  class="btn bg-red bc-white" value="注 册" id="submit" onclick="SignUp.CheckSubmit()" lay-skin="primary" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div><!--#reg-htx end-->

<div id="login-htx">
<link rel="stylesheet" href="/p/css/validatedrag/vdrag.css">
        <div class="login-main">
            <div class="login-nav layui-clear login-tab" id="login_btn">
            	<a href="javascript:;" class="active">账号登录</a>
                <a href="javascript:;">快捷登录</a>                
                <a href="javascript:;">扫码登录</a>
            </div>
            <div class="layui-clear">
                <div class="login-center">
                	
                    <!--Account login-->
                    <div class="login-log login login_mode">
                    <form id="normal-login"  method="post" action="/other/ssoapi" onsubmit="return logcheck()">
                    	<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
                        <div class="form-group layui-clear">
                            <label for="EmailOrPhone">账 <span class="ml10">号</span></label>
                            <div class="input-list">
                                <input type="text" class="form-control" name="EmailOrPhone" id="EmailOrPhone" onchange="SignUp.IsEmailOrPhone()" placeholder="您的手机号/邮箱">
                            </div>
                        </div>
                        <div class="form-group layui-clear">
                            <label for="txtPassword">密 <span class="ml10">码</span></label>
                            <div class="input-list">
                                <input type="password" class="form-control" name="txtPassword7" id="txtPassword7" onchange="SignUp.CheckPasswordLog()" placeholder="请输入密码">
                            </div>
                        </div>

                        
                        <div id="drag">
        					<div class="drag_bg"></div>
        					<div class="drag_text slidetounlock" onselectstart="return false;" unselectable="on">
            					请按住滑块，拖动到最右边
        					</div>
        					<div class="handler handler_bg"></div>
    					</div>

                        <div id="errordiv2" class="form-group layui-clear layui-hide" style="margin-bottom:20px; width:300px; position:relative; left:102px;">
                            <div  class="alert alert-danger htx-dismissable  f12" >
                                <i class="layui-icon f12 fw">&#x1006;</i>
                                <span id="errortip2"></span>
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                        <div class="form-group layui-clear sub-button" style="padding-bottom:0px; width:300px; position:relative; left:102px;">
                            <!--<a href="javascript:;" class="btn bg-red bc-white" onclick="SignUp.CheckPasswordSubmit()">登录</a>-->
                            <input name="submit" type="submit" class="btn bg-red bc-white" value="登 录"/>
                        </div>
                    </form>
                    </div>
                    <!--Quick login-->
                    <div class="yzm-login login_mode" style="display:none;">
                    <form id="quick-login"  method="post" action="/other/ssoapi" onsubmit="return quickLogcheck()">
                    	<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
                        <div class="form-group layui-clear">
                            <label for="phone">手 机 号</label>
                            <div class="input-list">
                                <input type="text" class="form-control" id="phone" name="mobile" onchange="SignUp.CheckQuickPhone()" placeholder="您的手机号">
                            </div>
                        </div>
                        <div class="form-group layui-clear">
                            <label for="yzm">短信验证码</label>
                            <div class="yzm-list">
                                <input type="text" class="form-control w50 fl" id="yzm" name="sms-yzm" onchange="SignUp.CheckQuickCode()" placeholder="请输入验证码">
                                <button id="btnSmsSend" type="button" class="frm_btnCode fr" style="width:100px; position:relative; right:7px;" onclick="SignUp.CheckbtnHtxSendQuick()">获取验证码</button>
                            </div>
                        </div>
                        <div id="errordivquick" class="form-group layui-clear layui-hide" style="width:301px; position:relative; left:102px;">
                            <div  class="alert alert-danger htx-dismissable  f12" >
                                <i class="layui-icon f12 fw">&#x1006;</i>
                                <span id="errorquick"></span>
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                        <div class="form-group layui-clear sub-button" style="padding-bottom:20px; width:300px; position:relative; left:102px; margin-top:10px;">
                            <!--<a href="javascript:;" class="btn bg-red bc-white" onclick="SignUp.CheckQuickSubmit()">登录</a>-->
                            <input name="quick_submit" type="submit" class="btn bg-red bc-white" value="登 录"/>
                        </div>
                     </form>
                    </div>
                    <!--扫一扫登录-->
                    <div class="login-qrcode login_mode" style="display: none;">
                        <h3 class="text-center bc-red">用微信扫一扫 只需1秒即可登录</h3>
                        <div class="yzm-box layui-clear">
                            <!--<div class="qr-img fl">
                                <img src="/p/images/member/erweima.png" alt="二维码">
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
                       <div class="form-group layui-clear" style="margin-bottom:10px; margin-left:102px;">
                            <span class="fl ">如不是会员，则<a class="ml5 bc-blue reghtx" rel="nofollow" href="javascript:;" onclick="reghtx(this)">注册</a></span>
                            <a class="fr bc-blue" href="/other/user_request_pwd">忘记密码？</a>
                        </div>
                        <div class="form-group layui-clear" style="margin-left:102px;">
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
<?php if(!is_home()) echo '<style> .form-group .input-list{ width:73%; } </style>'; ?>
<script src="/p/js/validatedrag/vdrag.js?ver=1.0"></script>
<script>
    $('#drag').drag();
</script>
</div><!--#login-htx end-->
<script src="/p/js/regLog.js?ver=1.2"></script>