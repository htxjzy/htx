<?php 
/*
Template Name: 火天信服务通
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
<?php include(TEMPLATEPATH . '/p_user_center_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(1)").addClass("cur");
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(7) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
<div class="htx-box">
                <div class="htx_top_info">
                    <div class="htx_top_info_left">
                        <div>
                            <h4>什么是火天信服务通？</h4>
                            <p>基础会员服务产品，为广大服务商量身定制。</p>
                        </div>
                        <div>
                            <h4>为什么开通火天信服务通？</h4>
                            <p>卡通享受更多特权，黄金广告位、投标特权、行业入驻等，只等你来。</p>
                        </div>
                        <div>
                            <h4>为什么开通火天信服务通？</h4>
                            <p>
                                在线开通火天信服务通，支付完成立即生效，享受火天信服务通的特权。
                                如有疑问，欢迎咨询我们的全国免费热线：400-626-3980
                            </p>
                        </div>
                    </div>
                    <div class="htx_top_info_right">
                        <em>
                            <img src="/p/images/member/b.png" alt="火天信" class="img-responsive">
                        </em>
                        <div class="more-introduce layui-clear">
                            <a href="#">点击了解更多</a>
                        </div>
                    </div>
                </div>
                <div class="goods-box">
                    <div class="layui-clear">
                        <div class="fl">
                            <i class="iconfont bc-red f24"></i>
                            <span class=" f18">暂未购买火天信服务通</span>
                        </div>
                        <div class="fr">
                            <a class="enu_button" href="javascript:;">专项广告投放范围</a>
                        </div>
                    </div>
                    <div class="htx-table">

                        <div class="pass-table" >
                            <table class="layui-table" lay-size="lg">
                                <colgroup>
                                    <col width="257">
                                    <col width="510">
                                    <col>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th colspan="3">
                                        <div class="title-table-name">
                                            <img src="/p/images/member/bb.png" alt="" class="img-responsive">
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="fw f16">服务通服务内容</span>
                                    </td>
                                    <td>
                                        <span>
                                            <span>火天信服务通</span>
                                            <b class="bc-red">￥4800</b>
                                            <span>+</span>
                                            <span>专项广告费</span>
                                            <b class="bc-red">￥5000</b>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align:right;">
                                        <span class="price-go mr20"><span class="f16">购买金额：</span>￥ <b class="f24 bc-red">9800</b>/年</span>
                                        <a class="btn-go" href="javascript:;">去购买</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <!--未开通 火天信服务通 end-->
                        <div class="pass-table">
                            <table class="layui-table" lay-size="lg">
                                <colgroup>
                                    <col width="257">
                                    <col width="510">
                                    <col>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th colspan="3">
                                        <div class="title-table-name">
                                            <img src="/p/images/member/bb.png" alt="" class="img-responsive">
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="fw f14">火天信服务通</span>
                                    </td>
                                    <td>
                                       <span>已购买</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw f14">服务内容</span>
                                    </td>
                                    <td>
                                        <span>火天信服务通     +      专项广告费</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw f14">购买金额</span>
                                    </td>
                                    <td>
                                        <span class="bc-red fw">￥9800元</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fw f14">服务时间</span>
                                    </td>
                                    <td>
                                        <span>2017年12月30日 — 2018年12月30日</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <!--已开通 火天信服务通-->
                    </div>

                    <div class="main-list layui-clear">
                        <ul>
                            <li>
                                <h3>功能细则</h3>
                                <dl>
                                    <dd>商铺装饰</dd>
                                    <dd>团队风采展示</dd>
                                    <dd>接单助手</dd>
                                    <dd>独享订单提供</dd>
                                    <dd>投标金额</dd>
                                    <dd>投标次数</dd>
                                    <dd>专线服务</dd>
                                    <dd>QQ在线沟通</dd>
                                    <dd>火天信服务<br>平台优推</dd>
                                    <dd>入驻数目量</dd>
                                </dl>
                            </li>
                            <li>
                                <h3>普通用户 <br>￥0元/<span class="f14">年</span></h3>
                                <dl>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/f.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/f.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>

                                    <dd>
                                        <span>
                                            <img src="/p/images/member/f.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/f.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>3000以内</dd>
                                    <dd>10/天</dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/f.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/f.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/f.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>主类别下1个；<br>下属小类别3个</dd>
                                </dl>
                                <div class="text-center pt20">
                                    <a class="layui-btn layui-btn-radius layui-btn-danger" href="javascript:;">预约体验</a>
                                </div>
                            </li>
                            <li>
                                <h3>火天信服务通 <br>￥9800元/<span class="f14">年</span></h3>
                                <dl>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/tr.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/tr.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/tr.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/tr.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>3万以内</dd>
                                    <dd>不限</dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/tr.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/tr.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>
                                        <span>
                                            <img src="/p/images/member/tr.png" alt="" class="img-responsive">
                                        </span>
                                    </dd>
                                    <dd>主类别下1个；<br>下属小类别20个</dd>
                                </dl>
                                <div class="text-center pt20">
                                    <a class="layui-btn layui-btn-radius layui-btn-danger" href="javascript:;">预约体验</a>
                                </div>
                            </li>
                            <li>
                                <h3>优势说明 <br><span class="f14">先前一步，占领市场</span></h3>
                                <dl>
                                    <dd>展示出独特的商铺风格促使雇佣的下单率</dd>
                                    <dd>展示团队风格加深雇主信任</dd>
                                    <dd>App掌控订单动向轻松接单</dd>
                                    <dd>新订单产品第一时间推送</dd>
                                    <dd>&nbsp;</dd>
                                    <dd>更多的投标机会结单率上涨</dd>
                                    <dd>会员用户疑难，会员用户第一时间解决</dd>
                                    <dd>与雇主实时联系，了解雇主需求提高下单率</dd>
                                    <dd>
                                        会员用户独享会员接单区域高端首页幻灯
                                        片，首页人才推荐位置轻松提高知名度快
                                        速获取当地优质雇主咨询接单
                                    </dd>
                                    <dd>扩大入驻类目，在多个列表展示店铺和服务</dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>															
            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



