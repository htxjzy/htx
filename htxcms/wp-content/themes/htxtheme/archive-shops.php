<?php get_header(); ?> 
<link rel="stylesheet" href="/p/css/original_main.css">
<style>
.layui-elem-field-q .layui-elem-field{ color:#454545; padding-top:2px; }
.layui-elem-field-q .layui-elem-field legend {font-size:18px; font-weight:normal;}
.layui-elem-field-q .layui-elem-field .layui-field-box{ /*position:relative;*/ }
.layui-elem-field-q .layui-elem-field .layui-field-box p{ margin-top:20px; margin-bottom:20px; font-size:14px;  }
.layui-elem-field-q .layui-elem-field .layui-field-box p i{ color:#e4393c; }
.layui-elem-field-q .layui-elem-field .layui-field-box a{ /*position:absolute; bottom:62px; right:10px; margin-right:10px;*/ margin:20px auto; display:block; width:150px;  border-radius:3px;  height:38px;  line-height:38px;  color:#fff;  background:#e4393c;  text-align:center; }
.layui-elem-field-q .layui-elem-field .layui-field-box a:hover{ background:#f74e5c; }
</style>
<a class="banner_box" style="background:url(/p/images/banners/banner_task.jpg) center top no-repeat;" href="#"></a>
<div class="wrap-for-s">
<div class="dyn-nav dyn-nav-for-s">
	<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;"></i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;"></i> <span>服务商列表</span>
    </blockquote>
</div>
<div class="task">
        <div class="layui-main">
            <!--<div class="single">
                <div class="htx-search htx-search-last">
                    <div class="tank_p  layui-clear">
                        <strong>按服务商擅长的分类：</strong>
                        <a class="cur" href="/shops" title="查看全部服务商" rel="nofollow">全部</a>
                        <a href="#" title="查看可承接工程咨询类任务的服务商">工程咨询</a>
                        <a href="#" title="查看可承接工程勘察类任务的服务商">工程勘察</a>
                        <a href="#" title="查看可承接工程设计类任务的服务商">工程设计</a>
                        <a href="#" title="查看可承接工程招标类任务的服务商">工程招标</a>
                        <a href="#" title="查看可承接工程造价类任务的服务商">工程造价</a>
                        <a href="#" title="查看可承接工程监理类任务的服务商">工程监理</a>
                        <a href="#" title="查看可承接工程施工类任务的服务商">工程施工</a>
                        <a href="#" title="查看可承接财务服务类任务的服务商">财务服务</a>
                        <a href="#" title="查看可承接评估服务类任务的服务商">评估服务</a>
                        <a href="#" title="查看可承接其他服务类任务的服务商">其他服务</a>
                    </div>
                </div>
            </div>-->
            <!--搜索 end-->

            <div class="single pb10">
                <div class="htx-list layui-clear">
                    <div class="list-table">                  
<fieldset class="layui-elem-field  layui-elem-field-q">
	<legend>服务商列表</legend>
	<div class="layui-field-box new-box">
		<!--<div class="talent_list layui-clear">
        	<a class="cur" href="javascript:;">综合</a>
            <a href="javascript:;">能力 <i class="layui-icon">&#xe625;</i></a>
            <a href="javascript:;">信用 <i class="layui-icon">&#xe625;</i></a>
            <a href="javascript:;">交易额 <i class="layui-icon">&#xe625;</i></a>
            <a href="javascript:;">中标量 <i class="layui-icon">&#xe625;</i></a>
            <a href="javascript:;">所在地区 <i class="layui-icon">&#xe625;</i></a>
		</div>-->
<div style="margin-bottom:10px; height:10px;"><hr/></div>

<?php
$paged=get_query_var('paged')?get_query_var('paged'):1;	
$args=array('post_type' => array('shops'), 'paged' => $paged);
$recentPosts=new WP_Query($args);
while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop start
$termArr = wp_get_object_terms($post->ID, 'shopstax', array('fields' => 'names')); 
$termname = $termArr[0];
$namesArr = wp_get_object_terms($post->ID, 'assignmentstax', array('fields' => 'names'));	
$be_good_at = '';
foreach($namesArr as $name){
	$be_good_at .= '<span>'.$name.'</span> ';
}
$be_good_at = rtrim($be_good_at, ' ');    
?> 
<div class="shop_list_box">
    <div class="shop_list_box_top">
        <a title="查看商铺-<?php $shop_name=get_post_meta( $post->ID, '_htx_shop_name', true ); echo $shop_name; ?>" href="<?php echo the_permalink(); ?>">
             <img src="<?php echo get_post_meta( $post->ID, '_htx_shop_logo', true ); ?>" />
             <span class="biaoshi" style="overflow:hidden;"><?php echo $termname; ?></span>
        </a>
        <div class="fright">                                 
             <h3><?php echo mb_substr($shop_name,0,26,'utf-8'); ?></h3>
             <p>所在地区：<span><?php echo get_post_meta( $post->ID, '_htx_shop_provid', true ); ?></span>-<span><?php echo get_post_meta( $post->ID, '_htx_shop_cityid', true ); ?></span>-<span><?php echo get_post_meta( $post->ID, '_htx_shop_areaid', true ); ?></span></p>
             <div class="shanchang">擅长领域：<br/><?php echo $be_good_at; ?></div>                                  
        </div>
        <div style="clear:both"></div>
    </div>
    <a class="interact-box" href="<?php echo the_permalink(); ?>" title="查看商铺-<?php echo $shop_name; ?>">走进商铺</a><!--.interact-box end-->   
</div><!--.shop_list_box end-->  
<?php 
endwhile;	//loop2 end  
wp_reset_postdata();
?>  
<fieldset class="layui-elem-field">
  <legend>申请成为火天信服务商</legend>
  <div class="layui-field-box">
<p><i class="layui-icon">&#xe617;</i> 申请条件： 拥有工程领域一定技能的个人或公司</p>
<p><i class="layui-icon">&#xe617;</i> 服务商价值： 申请成功后拥有独立的商铺，获得火天信品牌服务支撑，不受地域限制轻松接全国的工程任务做</p> 
<a href="/other/shop" class="shenqingzj">申请成为服务商</a>    
  </div>
</fieldset>

                <!--分页-->
<?php
    $big = 99999999999; // need an unlikely integer
	if(!empty(paginate_links($args))){
		echo '<div id="pagenavi"><div class="htxpage">';
		echo paginate_links($args);
		echo '</div></div><!--#pagenavi end-->';
	}
    $args = array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => $paged,
        'total' => $the_query->max_num_pages,
        //以下选用
        'show_all'     => False, 
        'end_size'     => 1, 
        'mid_size'     => 2, 
        'prev_next'    => True,
        'prev_text'    => __('&laquo; Previous'),
        'next_text'    => __('Next &raquo;'),
        'type'         => 'plain', 
        'add_args'     => False,
        'add_fragment' =>''
    );
?>
  </div><!--.new-box end-->
</fieldset>                       
                    </div>
                    <div class="list-user-box" style="padding-top:26px;">
                        <div class="htx-ads">
                            <div class="htx-ads-text layui-clear">
                                <span>微信关注</span>
                                <span>极速发布</span>
                                <span>省时省心</span>
                                <span>极致体验</span>
                            </div>
                            <div class="htx-ads-img">
                                <img src="<?php echo get_option('htx_wxfw_erweima'); ?>" alt="火天信服务号" class="img-responsive">
                            </div>
                        </div>
                        <div class="htx-call mt20">
                            <ul>
                                <li>
                                    <p>客服电话 <?php echo get_option('htx_service_phone'); ?></p>
                                </li>
                                <li>
                                    <p>客服QQ <?php echo get_option('htx_service_qq'); ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="htx-promise mt20">
                            <h3>火天信郑重承诺</h3>
                            <ul>
                                <li class="layui-clear">
                                    <div class="htx-promise-img">
                                        <img src="/p/images/p1.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="htx-promise-text">
                                        <span>一站式解决方案 &nbsp;让您省时省心</span>
                                    </div>
                                </li>
                                <li class="layui-clear">
                                    <div class="htx-promise-img">
                                        <img src="/p/images/p2.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="htx-promise-text">
                                        <span>捆绑式指定专家 &nbsp;为您牢牢把关</span>
                                    </div>
                                </li>
                                <li class="layui-clear">
                                    <div class="htx-promise-img">
                                        <img src="/p/images/p3.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="htx-promise-text">
                                        <span>招投标规范透明 &nbsp;服务性价比高</span>
                                    </div>
                                </li>
                                <li class="layui-clear">
                                    <div class="htx-promise-img">
                                        <img src="/p/images/p4.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="htx-promise-text">
                                        <span>火天信品牌担保 &nbsp;保障资金安全</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a style="display:none;" class="htx-adv-as mt20">
                        	<img src="/p/images/adh90.jpg" />
                        </a>                       

                    </div>
                </div>


            </div>
        </div>
    </div>
</div><!--.wrap-for-s end-->
<?php get_footer(); ?>