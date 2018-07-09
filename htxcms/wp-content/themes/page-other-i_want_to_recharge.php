<?php 
/*
Template Name: 我要充值
*/
?>	
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="javascript:;"></a>
<!-- banner end -->
<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
<div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_finance_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(3)").addClass("cur");
	$(".layui-main .layui-clear .finance-nav ul li:nth-child(4) a").addClass("select");	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
			<div class="htx-box htx-box-money">
                <h3>
                    <b class="bc-red">我要充值</b>
                </h3>
<div class="formdeposit">
<form class="layui-form"  method="post" action="/other/fee_submit" onsubmit="return CheckPost();">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
<input type="hidden" name="subject_code" value="1" />
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
<script type="text/javascript" src="/p/js/fee_submit.js?ver=1.6"></script>
</div>
                <!--<div class="pay_title layui-clear">
					<span >快捷支付</span>
                    <span class="select">支付宝/微信扫码</span>
                </div>
                <div class="pay_box_form">
                    <div class="htx-box-li" >
                        <div class="pay_number">
                            <b>充值金额</b>
                            <span>人民币，充值金额不小于1元</span>
                        </div>
                        <div class="pay-input-text">
                            <input name="charge_cash" type="text" value=""> 元
                            <span class="valid_error">
                            <span>请正确填写充值金额</span>
                        </span>
                        </div>
                        <div class="pay_li">
                            <span><b>使用网上银行付款</b></span>
                            <div class="pay-bank">
                                <ul class="layui-clear">
                                    <li>
                                        <label>
                                            <em>
                                            <span class="pay-radio pay-selected">
                                              <input name="bank_code" type="radio" value="icbc"  class="pay-hide">
                                            </span>
                                            </em>
                                            <i>
                                                <img src="http://static11.weikeimg.com/images/common/bank/bank_icbc.gif" alt="中国工商银行" width="93" height="20" disabled="">
                                            </i>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <em>
                                            <span class="pay-radio ">
                                              <input name="bank_code" type="radio" value="icbc"  class="pay-hide">
                                            </span>
                                            </em>
                                            <i>
                                                <img src="http://static11.weikeimg.com/images/common/bank/bank_icbc.gif" alt="中国工商银行" width="93" height="20" disabled="">
                                            </i>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="layui-clear text-center layui-form">
                            <div class="htx-agree" pane="" >
                                <input type="checkbox" name="agree" lay-skin="primary" title="" >
                                <span>我已阅读并同意</span> <a class="bc-red mr10" href="#">《火天信网充值服务协议》</a>
                            </div>
                            <div class="text-center pb20">
                                <button type="button" class="buttonmax "  >下一步</button>
                            </div>
                        </div>
                    </div>
                    <div class="htx-box-li" style="display: none">
                        <div class="pay_number">
                            <b>充值金额</b>
                            <span>人民币，充值金额不小于1元</span>
                        </div>
                        <div class="pay-input-text">
                            <input name="charge_cash" type="text"  value=""> 元
                            <span class="valid_error">
                            <span>请正确填写充值金额</span>
                        </span>
                        </div>
                        <div class="f16 pb20">
                            <b>扫码支付，更快捷</b>
                        </div>
                        <div class="pay_li">
                            <div class="pay-bank ">
                                <ul class="layui-clear">
                                    <li>
                                        <label>
                                            <em>
                                                <span class="pay-radio pay-selected">
                                                  <input name="bank_code" type="radio" value="icbc" checked  class="pay-hide">
                                                </span>
                                            </em>
                                            <i>
                                                <img src="/p/images/member/weixin.png" alt="微信支付" class="img-responsive">
                                            </i>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <em>
                                                <span class="pay-radio ">
                                                  <input name="bank_code" type="radio" value="icbc"  class="pay-hide">
                                                </span>
                                            </em>
                                            <i>
                                                <img src="/p/images/member/alipay.png" alt="支付宝支付" class="img-responsive">
                                            </i>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="layui-clear text-center layui-form">
                            <div class="htx-agree" pane="" >
                                <input type="checkbox" name="agree" lay-skin="primary" title="" >
                                <span>我已阅读并同意</span> <a class="bc-red mr10" href="#">《火天信网充值服务协议》</a>
                            </div>
                            <div class="text-center pb20">
                                <button type="button" class="buttonmax "  >下一步</button>
                            </div>
                        </div>
                    </div>
                </div>-->

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


