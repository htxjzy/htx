<?php get_header(); ?>
<?php date_default_timezone_set('prc'); ?>
<link rel="stylesheet" href="/p/css/original_main.css?ver=1.2">
<style>
.htx-tender{ margin-top:20px; }
.shop-intro{ padding:0px 30px 30px 30px; }
.shop-intro .shop-th{ position:relative; }
.shop-intro .shop-th a.vipshop { position:absolute; right:40px; top:130px; display:block; width:42px; height:42px; padding:2px; font-size:12px; color:#fff;  background:#cc3333;  text-align:center;  border-radius:21px;}
.shop-intro .shop-th .imglogo{ width:120px; height:120px; border:1px #e2e2e2 solid; border-radius:6px; position:absolute; right:0px; top:0px; }
.shop-intro .shop-th h1{ font-size:20px; text-align:center; color:rgba(210,19,86,1); margin-right:150px; background:#e2e2e2; border-radius:6px; padding:6px 10px; margin-bottom:15px; }
.shop-intro .shop-th p, .shop-intro .shop-th .address, .shop-intro .shop-th .be-good-at{ margin-top:6px; color:#454545; }
.shop-intro .shop-th p b{ font-weight:normal; color:#FF5722; }
.shop-intro .shop-th p span {margin-left:10px; color:#cc3333;}
.shop-intro .shop-th .address span{margin:0px 5px;}
.shop-intro .shop-th .be-good-at span {padding:2px 4px; border: 1px solid #FF5722; color:#FF5722; border-radius:3px; font-size:12px; margin-right:10px;}
.shop-intro .shop-td{ margin-top:20px; color:#454545; }
.shop-intro .shop-td p{ line-height:24px; margin-bottom:10px; color:#454545; }
.shop-intro .shop-td > p{ text-indent:2em; }
.shop-intro .shop-td p img{ max-width:100%; display:block; margin:0 auto; height:auto; }
</style>
<div class="wrap-for-s">
	<div class="dyn-nav dyn-nav-for-s">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <a href="/shops">服务商列表</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <span><?php echo excerpttitle(32); ?></span>
         </blockquote>
    </div>

    <div class="task">
        <div class="layui-main">

            <div class="single pb10">
                <div class="htx-list layui-clear">
                    <div class="list-table">                       
                        <div class="htx-tender htx-tender-bid">                            
                            <div class="htx-main-box">
<div class="shop-intro">
	<div class="shop-th">
        <img class="imglogo" src="<?php echo get_post_meta( $post->ID, '_htx_shop_logo', true ); ?>" />
        <h1><?php the_title(); ?></h1>
        <p>商铺类型：<b>个人商铺</b></p>      
        <!--<p>能力等级：高手 <span>能力值 200010</span></p>
        <p>信用等级：值得信赖 <span>信用值70</span></p>
        <p>承诺保障：金牌诚信宝 <span>￥6000</span></p>                                  
        <a class="vipshop" href="javascript:;"><span>vip</span><br/>商铺</a>-->
        <div class="address">所在地区：<span><?php echo get_post_meta( $post->ID, '_htx_shop_provid', true ); ?></span><span><?php echo get_post_meta( $post->ID, '_htx_shop_cityid', true ); ?></span><span><?php echo get_post_meta( $post->ID, '_htx_shop_areaid', true ); ?></span></div>
<?php 
$namesArr = wp_get_object_terms($post->ID, 'assignmentstax', array('fields' => 'names'));	
$be_good_at = '';
foreach($namesArr as $name){
	$be_good_at .= '<span>'.$name.'</span> ';
}
$be_good_at = rtrim($be_good_at, ' ');
?>
        <div class="be-good-at">擅长领域：<?php echo $be_good_at; ?></div>                            
    </div>
    <div class="shop-td">
<?php echo $post->post_content; ?>
    </div>                                                                        
</div>
 
                                
                                
                                   <div class="task-work-wrap">
									   <div class="blk20"></div>
                                       <div class="borbox">
                                            <div class="bar_title">
                                                <b class="fl"><i class="layui-icon" style="font-size:22px; color:#8071b2; position:relative; top:3px;">&#xe612;</i> 您可能需要的服务商</b>
                                                <a class="fr aborder" target="_blank" href="/shops">更多服务商</a>
                                                <hr>  
                                            </div>
                                            <div class="guess_talent">
<?php 
$args=array(
	'post_type' 	=> array('shops'), 
	'post__not_in' 	=> array(get_the_ID()),
	'posts_per_page'=>7 
);
$querybid = new WP_Query($args);
while ($querybid->have_posts()) : $querybid->the_post();
?>
<a href="<?php the_permalink(); ?>" title="查看-<?php the_title(); ?>" target="_blank"><img src="<?php echo get_post_meta( $post->ID, '_htx_shop_logo', true ); ?>" /></a>
<?php 
endwhile;	
wp_reset_postdata();
?>                                                  

                                                <div style="clear:both;"></div>
                                            </div>
                                        </div>
                                        <div class="blk20"></div>
                                        <!--您可能需要的服务商 end-->
                                        <div class="tasklistnewsli borbox">
                                            <div class="bar_title">
                   <b class="fl"><i class="layui-icon" style="font-size:22px; color:#8071b2; position:relative; top:3px;">&#xe612;</i> 您可能想承接的任务</b>
                                                <a class="fr aborder" target="_blank" href="/assignments">更多的任务</a> 
                                                <hr> 
                                            </div>
                                            <div class="newcommend">
<?php 
$args=array(
	'post_type' 	=> array('assignments'), 
	'posts_per_page'=>6
);
$querybid = new WP_Query($args);
while ($querybid->have_posts()) : $querybid->the_post();
?>
<a href="<?php the_permalink(); ?>" target="_blank" title="查看任务-<?php the_title(); ?>"><span><i class="layui-icon">&#xe609;</i> ￥ <?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?></span><?php echo excerpttitle(16); ?></a>
<?php 
endwhile;	
wp_reset_postdata();
?> 
                                                        
<div style="clear:both;"></div>
                                            </div>
                                        </div>

                                    </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="list-user-box" style="padding-top:20px">
<?php include(TEMPLATEPATH . '/sidebar_one.php');  ?>
                        <a class="htx-adv mt20">
                        	<img src="/p/images/adh90.jpg" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--.wrap-for-s end-->
<?php get_footer(); ?>