<?php 
/*
Template Name: 我的信用情况
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(5) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
			<div class="htx-box">
                <h3>
                    <b class="bc-red">我的信用情况</b>
                    <a class="fr" href="#">什么是服务商信用等级？</a>
                </h3>
                <div class="main-box">
                    <div class="text-center f16 pt30 pb20">
                        <b>
                            当前 <span class="bc-yellow2">一级信用2</span>，升级到三级还需要 <span class="bc-yellow2">9</span>个信用积分
                        </b>
                    </div>
                    <div class="user_conter_badge">
                        <i class="layui-icon f30 bc-yellow">&#xe658;</i>
                        <i class="layui-icon f30 bc-yellow">&#xe658;</i>
                        <i class="layui-icon f30 bc-gay">&#xe658;</i>
                        <i class="layui-icon f30 bc-gay">&#xe658;</i>
                        <i class="layui-icon f30 bc-gay">&#xe658;</i>
                    </div>
                    <div class="user_conter_star">
                        <div class="user_conter_star_txt">
                            <span class="bc-yellow2">无</span>
                            <span class="bc-yellow2">一级</span>
                            <span class="bc-yellow2">二级</span>
                            <span class="">三级</span>
                            <span class="">四级</span>
                            <span class="">五级</span>
                        </div>
                        <div class="user_conter_star_bg">
                            <div class="user_conter_star_x" style="width:48.666666666667%;"></div>
                            <div class="user_conter_star_sx">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                            </div>
                        </div>
                        <div class="user_conter_star_num">
                            <span>0</span>
                            <span>1</span>
                            <span>10</span>
                            <span>25</span>
                            <span>60</span>
                            <span>80</span>
                            <span>100以上</span>
                        </div>
                    </div>
                    <div class="main-table">
                        <div class="user_conter_evaluate layui-clear">
                            <span class="select">信用积分记录</span>
                        </div>
                        <div class="userconter_evaluatenum layui-clear">
                            <span class="select"><a href="javascript:;">全部</a></span>
                            <span><a href="javascript:;">加分</a></span>
                            <span><a href="javascript:;">减分</a></span>
                        </div>

                        <table class="layui-table" lay-skin="nob">
                            <colgroup>
                                <col width="55%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th>事件</th>
                                <th>加分</th>
                                <th>扣分</th>
                                <th>积分</th>
                                <th>时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>添加案例展示</td>
                                <td><span class="bc-yellow2 fw">+1</span></td>
                                <td><span>0</span></td>
                                <td><span class="bc-red fw">1</span></td>
                                <td>2017-05-23 19:20:13</td>
                            </tr>

                            <tr>
                                <td>添加案例展示</td>
                                <td><span class="bc-yellow2 fw">+1</span></td>
                                <td><span>0</span></td>
                                <td><span class="bc-red fw">1</span></td>
                                <td>2017-05-23 19:20:13</td>
                            </tr>
                            <tr>
                                <td>添加案例展示</td>
                                <td><span class="bc-yellow2 fw">+1</span></td>
                                <td><span>0</span></td>
                                <td><span class="bc-red fw">1</span></td>
                                <td>2017-05-23 19:20:13</td>
                            </tr>
                            <tr>
                                <td>添加案例展示</td>
                                <td><span class="bc-yellow2 fw">+1</span></td>
                                <td><span>0</span></td>
                                <td><span class="bc-red fw">1</span></td>
                                <td>2017-05-23 19:20:13</td>
                            </tr>
                            <tr>
                                <td>添加案例展示</td>
                                <td><span class="bc-yellow2 fw">+1</span></td>
                                <td><span>0</span></td>
                                <td><span class="bc-red fw">1</span></td>
                                <td>2017-05-23 19:20:13</td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="layui-none-information">
                                        <i></i>
                                        <span>暂时没有信息</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>									
            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



