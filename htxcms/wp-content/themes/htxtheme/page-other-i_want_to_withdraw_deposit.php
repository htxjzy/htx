<?php 
/*
Template Name: 我要提现
*/
?>
<?php
if(!is_user_logged_in()){	
	echo "请先登录";
}else{
?>		
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
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
                    <b class="bc-red">我要提现</b>
                </h3>
                <p style="margin-top:100px; color:#898989; text-align:center;">请联系客服安排提现事宜。</p>
                <!--<div class="postal">
                    <h3 class="f16"><b>提现至银行卡</b></h3>
                    <div class="bank-postal layui-clear">
                        <em> <img src="http://static11.weikeimg.com/images/common/bank/bank_icbc.gif" alt="中国工商银行" class="img-responsive"></em>
                        <span>中国工商银行**************5215</span>
                    </div>
                </div>
                <div class="postal">
                    <h3><b class="f16">提现金额</b><span class="bc-red f14 ml10">人民币提现金额不小于10元</span></h3>
                    <div class="pay-input-text">
                        <input name="charge_cash" type="text" value=""> 元
                        <span class="valid_error">
                            <span>请正确填写充值金额</span>
                        </span>
                    </div>
                </div>
                <div class="table-price">
                    <table class="layui-table" lay-size="lg">
                        <colgroup>
                            <col width="25%">
                            <col width="25%">
                            <col width="25%">
                            <col width="25%">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>300元以下（含300元）</th>
                            <th>300元以下（含300元）</th>
                            <th>300元以下（含300元）</th>
                            <th>300元以下（含300元）</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1.5元/笔</td>
                            <td>1.5元/笔</td>
                            <td>1.5元/笔</td>
                            <td>1.5元/笔</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="iphone-box">
                    <div class="layui-from">
                        <div class="layui-form-item">
                            <div class="layui-inline ">
                                <label class="layui-form-label ">支付密码：</label>
                                <div class="layui-input-inline w300">
                                    <input type="password" name="pwd" lay-verify="" autocomplete="off" class="layui-input">
                                    <span class="bc-red">支付密码不正确，请重新输入</span>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline ">
                                <label class="layui-form-label ">手机号码：</label>
                                <div class="layui-input-inline w300">
                                    <input type="text" name="pwd" lay-verify="" autocomplete="off" class="layui-input">
                                    <span class="bc-red">请正确输入手机号码</span>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-inline ">
                                <label class="layui-form-label ">验证码：</label>
                                <div class="layui-input-inline w300">
                                    <input type="text" name="pwd" lay-verify="" autocomplete="off" class="layui-input yzm">
                                    <button id="btnSmsSend" type="button" class="frm_btn fr ">获取验证码</button>
                                    <span class="bc-red">请输入验证码</span>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="text-center pb20">
                                <button type="button" class="buttonmax ">下一步</button>
                            </div>
                        </div>

                    </div>
                </div>-->

            </div>						            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



