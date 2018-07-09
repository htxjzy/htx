<?php 
/*
Template Name: 我的能力评价
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(4) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
			<div class="htx-box">
                <h3>
                    <b class="bc-red">我的能力评价</b>
                </h3>
                <div class="credit-rating">
                        <div class="text-center f16">
                            <b>当前<span class=" ml5 bc-red f16">一重（0）</span>，升级到二重还需要<span class="ml5 bc-red f16">500</span></b>
                        </div>
                    <div class="resdenji_box">
                        <div class="resdenjibox_b"></div>
                        <div class="resdenjibox_x" style="width: 13%;"></div>
                        <div class="resdenjibox_t">
                            <span class="bc-red">
                                <span style="margin-left:0;">
                                    <strong>一重</strong>
                                    <br>0
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>二重</strong>
                                    <br>500
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>三重</strong>
                                    <br>1000
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>四重
                                    </strong>
                                    <br>5000
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>五重
                                    </strong>
                                    <br>10000
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>六重</strong>
                                    <br>20000
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>七重</strong>
                                    <br>60000
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>八重</strong>
                                    <br>100000
                                </span>
                            </span>
                            <span>
                                <span>
                                    <strong>九重</strong>
                                    <br>150000
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="fuwushang_title layui-clear">
                        <div class="left">
                            <span>服务商成长数据：</span>
                        </div>
                        <i></i>
                        <div class="right">
                            <span>成功交易 <b class="bc-red">0 </b>次，赚得 <b class="bc-red"> 0.00 </b>元</span>
                        </div>
                    </div>
                    <div class="layui-clear">
                        <table width="100%" border="0" cellspacing="1" cellpadding="0" class="tablebor">
                            <tbody>
                            <tr class="bgf4">
                                <td align="center">平均好评率</td>
                                <td width="25%" height="38" align="center">工作速度</td>
                                <td width="25%" align="center">工作质量</td>
                                <td width="25%" align="center">工作态度</td>
                            </tr>
                            <tr>
                                <td rowspan="2" align="center">
                                    <span class="f36 bc-red thumb" style="line-height:70px;">0%</span>
                                </td>
                                <td height="38" align="center">
                                    <span class="trt">
                                        <b class="fl pr5">0.0</b>
                                        <span class="user_starbox">
                                          <span class="user_star_selected fl" style="width:100%;"></span>
                                        </span>
                                    </span>
                                </td>
                                <td align="center">
                                    <span class="trt">
                                        <b class="fl pr5">0.0</b>
                                        <span class="user_starbox">
                                          <span class="user_star_selected fl" style="width:100%;"></span>
                                        </span>
                                    </span>
                                </td>
                                <td height="38" align="center">
                                    <span class="trt">
                                        <b class="fl pr5">0.0</b>
                                        <span class="user_starbox">
                                          <span class="user_star_selected fl" style="width:100%;"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td height="38" align="center">
                                    <span class="bc-red">0</span>
                                    <span class="">人评价</span>
                                </td>
                                <td align="center">
                                    <span class="bc-red">0</span>
                                    <span class="">人评价</span>
                                </td>
                                <td align="center">
                                    <span class="bc-red">0</span>
                                    <span class="">人评价</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="userconter_evaluate mt35">
                        <span class="">
                            <a href="#">来自雇主的评价</a>
                        </span>
                        <span class="select">
                            <a href="#">我给雇主的评价</a>
                        </span>
                    </div>
                    <div class="layui-clear">
                        <div class="userconter_evaluatenum layui-clear">
                            <span class="select"><a href="#">全部评价(<span class="">0</span>)</a></span>
                            <span><a href="#">好评(<span class="">0</span>)</a></span>
                            <span><a href="#">中评(<span class="">0</span>)</a></span>
                            <span><a href="#">差评(<span class="">0</span>)</a></span>
                        </div>
                        <div class="box-list">
                            <div class="userconter_evaluatetit">
                                <span class="width1">评价详情</span>
                                <span class="width2">获得信誉值</span>
                                <span class="width3">时间</span>
                            </div>
                            <div class="user-evaluate">
                                <ul style="display: none;">
                                    <li class="layui-clear">
                                        <div class="details">
                                            <span> sadadfsafe</span>
                                        </div>
                                        <div class="honor">
                                            <span>1524</span>
                                        </div>
                                        <div class="estimate">
                                          <span> 2017-12-12</span>
                                        </div>
                                    </li>
                                    <li class="layui-clear">
                                        <div class="details">
                                            <span> sadadfsafe</span>
                                        </div>
                                        <div class="honor">
                                            <span>1524</span>
                                        </div>
                                        <div class="estimate">
                                            <span> 2017-12-12</span>
                                        </div>
                                    </li>
                                    <li class="layui-clear">
                                        <div class="details">
                                            <span> sadadfsafe</span>
                                        </div>
                                        <div class="honor">
                                            <span>1524</span>
                                        </div>
                                        <div class="estimate">
                                            <span> 2017-12-12</span>
                                        </div>
                                    </li>
                                </ul>

                                <div class="layui-none-information">
                                    <i></i>
                                    <span>暂时没有信息</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>						
            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



