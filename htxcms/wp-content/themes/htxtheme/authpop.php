<link rel="stylesheet" href="/p/css/authpop.css?ver=1.0">
<?php if(is_user_logged_in()){ $cur_user = $current_user->ID; } ?>
<div id="mobile-auth" style="display:none">
<form class="layui-form" action="">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <input type="hidden" name="userid_auth" value="<?php echo $cur_user; ?>" />
  <input type="hidden" name="mobile_submit" value="mobileBind" />
  <div class="layui-form-item">
    <label class="layui-form-label">手机号码</label>
    <div class="layui-input-block">
      <input name="mobile" lay-verify="required|phone" onchange="AuthStart.CheckMobile()" autocomplete="off" placeholder="请输入手机号码" class="layui-input" type="text">
    </div>
    <span class="auth-error"></span>
  </div>  
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">短信验证码</label>
      <div class="layui-input-inline">
        <input name="msmcode" lay-verify="required|number" autocomplete="off" class="layui-input" type="tel">
      </div>
    </div>
    <span class="auth-error"></span>
    <div class="layui-inline">
      <button type="button" id="btnGetMsmcode" onclick="AuthStart.SendMsmCode()">获取验证码</button>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="mobilesubmit">提 交</button>
    </div>
  </div>
</form>
</div>


<div id="email-auth" style="display:none">
<form class="layui-form" action="">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <input type="hidden" name="userid_auth" value="<?php echo $cur_user; ?>" />
  <input type="hidden" name="email_submit" value="emailBind" />
  <div class="layui-form-item">
    <label class="layui-form-label">邮箱</label>
    <div class="layui-input-block">
      <input name="email" lay-verify="required|email" onchange="AuthStart.CheckEmail()" autocomplete="off" placeholder="请输入邮箱" class="layui-input" type="text">
    </div>
    <span class="auth-error"></span>
  </div>  
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">验证码</label>
      <div class="layui-input-inline">
        <input name="emacode" lay-verify="required|number" autocomplete="off" class="layui-input" type="tel">
      </div>
    </div>
    <span class="auth-error"></span>
    <div class="layui-inline">
      <button type="button" id="btnGetEmacode" onclick="AuthStart.SendEmaCode()">获取验证码</button>
    </div>
  </div>
  
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit="" lay-filter="emailsubmit">提 交</button>
    </div>
  </div>
  
</form>
</div>
<script src="/p/js/authpop.js?ver=1.3"></script>