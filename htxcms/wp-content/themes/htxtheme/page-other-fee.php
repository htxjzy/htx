<?php 
/*
Template Name: 收费页面
*/
?>
<?php
//header ( "Content-type:text/html;charset=utf-8" );
//date_default_timezone_set('prc');  //Time shows Beijing time
//echo "<p>欢迎来到收费页面</p>";
include TEMPLATEPATH . '/header.php';
?>
<link rel="stylesheet" href="/p/css/fee.css">
<div class="formwrap">
<form class="layui-form"  method="post" action="/other/fee_submit" onsubmit="return CheckPost();">
<!--<form class="layui-form" action="">-->
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <!--<div class="layui-form-item">
    <label class="layui-form-label">款项名称</label>
    <div class="layui-input-block">
      <input type="text" name="subject"  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>-->
  <!--<div class="layui-form-item">
    <label class="layui-form-label">订单号</label>
    <div class="layui-input-block">
      <input type="text" name="out_trade_no"  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
    </div>
  </div>-->
  <div class="layui-form-item">
    <label class="layui-form-label">价格（元）</label>
    <div class="layui-input-block" style="width:388px;">
      <input type="text" name="total_fee" placeholder="请输入费用" autocomplete="off" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">选择支付方式</label>
    <div class="layui-input-block">
<ul class="layui-tab-title">
	<li value="alipay"><i></i></li>
    <li value="wxpay"><i></i></li>
</ul>
    </div>
  </div>
<input type="hidden" name="whosedata" />  
	<div class="layui-form-item">
    	<div class="layui-input-block layui-input-block-submit">
            <input class="layui-btn feeSubmit" type="submit" name="submit" value="提 交"/>
    	</div>
	</div>
</form>
<script type="text/javascript" src="/p/js/fee_submit.js?ver=1.3"></script>
</div>
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