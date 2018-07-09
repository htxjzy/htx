<?php 
/*
Template Name: 火天信诚信宝
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(6) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
			<div class="htx-box">
                <h3>
                    <b class="bc-red">火天信诚信宝</b>
                </h3>

                <div class="htx-table">
                    <div class="guarantee">
                        <h3>您还未暂存诚信保障金</h3>
                        <span>您当前是"三不威客"：不保证完成、不保证售后、不保证原创<br>雇主怎么放心跟您交易呢？</span>
                    </div>
                    <div class="estate">
                        <ul class="layui-clear">
                            <li>
                                <strong>保证完成</strong>
                                <span>
                                    <img src="/p/images/member/hbg.png" alt="" class="img-responsive">
                                </span>
                                <span>
                                    <img src="/p/images/member/hbg.png" alt="" class="img-responsive">
                                </span>
                            </li>
                            <li>
                                <strong>已开通</strong>
                                <span>
                                  一重版：￥1000
                                </span>
                                <span>
                                    <img src="/p/images/member/hbg.png" alt="" class="img-responsive">
                                </span>
                                <span>
                                    <img src="/p/images/member/hbg.png" alt="" class="img-responsive">
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="open-minded-box">
                        <h3><b>待支付（1）笔</b></h3>
                        <div class="list-price-box">
                            <div class="tit">
                                <span>剩余 <b class="bc-red mr5 ml5">￥4000</b>待支付</span>
                                <span class="bc-gay">下单时间：2017.11.01 11:45</span>
                                <span class="bc-gay">订单编号：465509</span>
                                <a class="sub" href="javascript:;">支付</a>
                                <a href="javascript:;">取消订单</a>
                            </div>
                            <div class="list">
                                <ul>
                                    <li>
                                        <i class="iconfont bc-red f24"></i>
                                        <span><b class="bc-red">￥2000</b> 保证完成铜板币,剩余 <b class="bc-red">￥2000</b> 待支付</span>
                                    </li>
                                    <li>
                                        <i class="iconfont bc-red f24"></i>
                                        <span><b class="bc-red">￥2000</b> 保证完成铜板币,剩余 <b class="bc-red">￥2000</b> 待支付</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="information-box layui-form">
                        <h3>诚信卫士可以选择提供单项目服务，<span class="bc-red">选择越多，信用值越高，获得更多雇主青睐</span></h3>
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
                                        <img src="/p/images/member/bl.png" alt="" class="img-responsive">
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <span class="f14">保证条约：按时交稿，及时修改</span>
                                </td>
                                <td>
                                    <span>赔偿金额</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="f14">
                                        <i class="one fl"></i>
                                          <div class=" fl" pane="">
                                            <div class="layui-block ">
                                              <input type="radio" name="sex" value="1" title="一重版：￥1000" checked="">
                                            </div>
                                          </div>
                                    </div>
                                </td>
                                <td>
                                    <span>若无法做到完成按时交稿、及时修改，则赔偿雇主￥1000元</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="f14">
                                        <i class="two fl"></i>
                                          <div class="  fl" pane="">
                                            <div class="layui-block ">
                                              <input type="radio" name="sex" value="2" title="二重版：￥2000" >
                                            </div>
                                          </div>
                                    </div>
                                </td>
                                <td>
                                    <span>若无法做到完成按时交稿、及时修改，则赔偿雇主￥2000元</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="f14">
                                        <i class="three fl"></i>
                                          <div class=" fl" pane="">
                                            <div class="layui-block ">
                                              <input type="radio" name="sex" value="3" title="三重版：￥3000" >
                                            </div>
                                          </div>
                                    </div>
                                </td>
                                <td>
                                    <span>若无法做到完成按时交稿、及时修改，则赔偿雇主￥3000元</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="text-center">
                                        <input type="checkbox" name="purchase" checked >
                                        <span class="bc-red f16">开通火天信诚信宝</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="htx-agree" pane="" >
                            <input type="checkbox" name="agree" lay-skin="primary" title="" >
                            我已阅读并接受<a class="bc-blue mr10" href="#">《火天信诚信宝服务协议》</a>
                        </div>
                        <div class="w_box">
                            <p class="pt20 text-right">
                                <span>总计：<b class="bc-red f18 fw">￥5000</b></span>
                            </p>
                            <p class="text-right pt20">
                                <a class="layui-btn  bg-red" href="javascript:;">立即开通</a>
                            </p>
                        </div>
                    </div>
                    <div class="w_box line-center">
                        <span>服务商常见问题</span>
                    </div>
                    <div class=" htx-trouble w_box pt20  ">
                        <ul class="layui-clear">
                            <li>
                                <h3>1、什么是火天信诚信宝？</h3>
                               <p>
                                   火天信诚信宝是指威客暂存￥1000~9000保证金，并承诺“保证完成、保证售后、保证原创”。
                               </p>
                                <p>
                                    如有食言，向雇主先行赔付保证金，并酌情退还任务赏金。
                                    火天信诚信宝包括三大保证项目，可以单独开通
                                </p>
                                <p>• 保证完成：按时交稿，及时修改（￥1000~￥3000）</p>
                                <p>• 保证售后：售后服务3个月免费（￥1000~￥3000）</p>
                                <p>• 保证原创：稿件原创，尊重版权（￥1000~￥3000）</p>
                                <p>
                                    此外根据单个保证项目暂存保证金的金额不同，又细分成金币版￥3000、银币版￥2000、铜币版￥1000。
                                </p>
                               <h3>2、开通阶段问题汇总？</h3>
                                <strong>（1）威客需要满足什么条件，才可以加入火天信诚信宝？</strong>
                                <p>• 通过身份实名认证</p>
                                <p>• 已开通商铺</p>
                                <p>• 平均好评率=>90% 或 暂无</p>
                                <p>• 未被列入黑名单</p>
                                <strong>（2）为什么不能单独购买”保证售后“或者”保证原创“？</strong>
                                <p>
                                    “保证完成”是购买”保证售后“和”保证原创“的前提，所以无法单独购买”保证售后“或者”保证原创“。
                                </p>
                                <p>
                                    这是因为：在一品威客网上“接单->完成任务->赚钱赏金”是所有威客梦寐以求的事情，
                                    如果连按照雇主的需求“完成任务“的勇气都没有，又有何脸面敢跟雇主承诺“售后服务”和“作品的原创性”。
                                </p>
                                <strong>
                                    （3）用于”保证原创“的保证金可以直接转移去开通”保证售后“吗？
                                </strong>
                                <p>一般情况下，不可以。 同理，所有保证项目间的资金不可以随意转移。</p>
                                <strong>
                                    （4）“第几年”和“积分”是什么，有什么关系？
                                </strong>
                                <p>
                                    “第几年”和”积分“都可以代表您加入“保证XX”已经有多久了，时间越久雇主越信赖。
                                    其中”第几年“是以年为单位，”积分“以天为单位。比如加入“保证XX”的第1天，记作”第1年“”积分 1“。
                                </p>
                                <p>第几年”和“积分”的换算关系如下：</p>
                                <p>• 365个积分内=“保证XX”第一年；</p>
                                <p>• 大于365小于730积分=“保证XX”第二年，以此类推；</p>
                                <p>版本升级时，低版本的积分自动兑换成高版本。</p>
                                <p>• 2个铜币积分=1个银币积分；</p>
                                <p>• 3个铜币积分=1个金币积分；</p>
                                <p>若关闭“保证XX“，则历史累计积分清空。</p>
                                <h3>3、申请退款（申请关闭）阶段</h3>
                                <strong>（1）为什么我无法申请退款？</strong>
                                <p>
                                    您可能处于投诉处理期，需要等投诉处理完毕后才可申请。
                                    保证原创、保证售后未开通或者退款成功后，才可以申请保证完成退款。
                                </p>
                                <strong>
                                    （2）为什么我申请退款后，账户余额上没有立即收到钱？
                                </strong>
                                <p>
                                    退款申请客服会在1~2个工作内日审核，通过审核自动退款到您的账户。
                                    如果审核未通过，系统会以站内信和邮件的方式通知原因。
                                </p>
                            </li>
                            <li>
                                <h3>4、纠纷阶段问题汇总</h3>
                                <strong>（1）威客如何知道自己已被雇主投诉？该怎么办？</strong>
                                <p>
                                    若威客被雇主投诉未履行”保证XX“的承诺，系统会以站内信、邮件、短信的方式通知威客。
                                </p>
                                <p>通知之日起7天内，可以联系客服申诉。</p>
                                <p>（客服QQ:400xxxxx67 ,电话:4006-xxx-xxx）</p>
                                <strong>（2）为什么"保证XX"会被冻结？如何解冻？</strong>
                                <p>被冻结的原因有多种：</p>
                                <p>•雇主投诉期间，"保证XX"被冻结。若客服裁定非威客过失，则自动解冻。</p>
                                <p>• "保证XX"保证金赔偿给雇主后，剩余保证金不足￥1000，"保证XX"被冻结。
                                    结束纠纷，系统自动解冻。若此时保证金不足，"保证XX"功能暂时关闭，需要补缴保证金。
                                </p>
                                <p>•保证完成是保证原创和保证售后的前提，保证完成一旦冻结或关闭，保证原创和保证售后会被关联冻结。
                                    冻结期间相关功能暂时关闭。一旦保证完成解冻，保证原创和保证售后也会解冻。
                                </p>
                                <div class="site-text">
                                    <strong>（3）裁定投诉成立后，雇主可以得到哪些补偿？</strong>
                                    <table class="site-table">
                                        <colgroup>
                                            <col width="33.3333%">
                                            <col width="33.3333%">
                                            <col width="33.3333%">
                                            <col>
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th><b>保证项目</b></th>
                                            <th><b>保证金</b></th>
                                            <th><b>任务赏金</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <i class="three"></i>
                                                <span>保证完成</span>
                                            </td>
                                            <td>最高赔付￥3000</td>
                                            <td>全额退款</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <i class="two"></i>
                                                <span>保证完成</span>
                                            </td>
                                            <td>最高赔付￥2000</td>
                                            <td>全额退款</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                    <i class="one"></i>
                                                    <span>保证完成</span>
                                            </td>
                                            <td>最高赔付￥1000</td>
                                            <td>全额退款</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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



