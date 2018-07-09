<?php 
/*
Template Name: 各个工具展示
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
	$(".layui-main .layui-clear > .user-left > ul li.c-tools dl dd:nth-child(1) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
			<div class="htx-box">
                <h3>
                    <b class="bc-red">各个工具展示</b>
                </h3>
                <div class="fina_box layui-clear bg-white mt10">
                    <div class="tool-shop">
                        <div class="tool-list ">
                            <ul class="layui-clear">
                                <li>
                                    <a href="#">
                                        <em>
                                            <img src="/p/images/member/eye.png" alt="" class="img-responsive">
                                        </em>
                                        <div>
                                            <h3>隐藏稿件</h3>
                                            <p>稿件仅您和雇主可见</p>
                                            <p>提升原创度和保密性</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <em><img src="/p/images/member/h.png" alt="" class="img-responsive"></em>
                                        <div>
                                            <h3>旺铺装修</h3>
                                            <p>更丰富的店铺装修功能</p>
                                            <p>让你的商铺旺起来</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <em><img src="/p/images/member/s.png" alt="" class="img-responsive"></em>
                                        <div>
                                            <h3>首页轮播广告位</h3>
                                            <p>一线城市：1.10元/次起</p>
                                            <p>二线城市：1.00元/次起</p>
                                            <p>城市分类划分</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <em><img src="/p/images/member/g.png" alt="" class="img-responsive"></em>
                                        <div>
                                            <h3>更多工具</h3>
                                            <p>更多工具，敬请期待！</p>
                                            <p>一品将持续创新发力！</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>


                </div>
            </div>         
															            
        </div>
    </div>
</article>
<?php get_footer(); ?>

<?php } ?>



