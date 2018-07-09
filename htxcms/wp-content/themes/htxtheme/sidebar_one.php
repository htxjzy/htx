<?php
$args=array(
	'post_type' => array('assignments'),
	'posts_per_page'=>1,
	'tax_query' => array(array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'recommended'))  
);
$recentPosts=new WP_Query($args);
//while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
if($recentPosts->have_posts()){
	for($i=0; $i<1; $i++){
		$recentPosts->the_post();
		if(!empty(get_the_ID())){
?>        
                        <div class="rem-box" id="<?php the_ID(); ?>">                                                
                            <a class="rem-img" href="<?php the_permalink(); ?>" target="_blank" title="查看任务-<?php the_title(); ?>">
                            <?php $getThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),full); ?>
                                 <img src="<?php echo $getThumbnail[0];  ?>"/><span class="span">荐</span>
                            </a>
                            <div class="rem-price">￥<?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?></div>
                            <div class="rem-name"><?php echo excerpttitle(18); ?></div>
                            <div class="rem-type layui-clear">
                                <span class="bc-red fl"><i class="layui-icon" style="font-size:20px; color:#FF5722; position:relative; top:2px;">&#xe756;</i> 招标中</span>
                                <span class="fr"><i class="layui-icon" style="font-size:20px; color:#FF5722; position:relative; top:2px;">&#xe60e;</i> 剩余
<?php 
date_default_timezone_set('prc');  //Time shows Beijing time
$ass_bid_end = get_post_meta( $post->ID, '_htx_ass_bid_end', true );
$distance = strtotime($ass_bid_end)-time();
if($distance>0){
	echo dtime2second($distance);
}else{
	echo "0";
}
?>                                    
                                </span>
                            </div>
                            <div class="rem-sub">
                                <a class="bc-yellow" href="<?php the_permalink(); ?>">我要投标</a>
                            </div>
                        </div>
        
<?php
		}
	}
}
//endwhile;	//loop2 end  
wp_reset_postdata();
?> 
<?php
$args=array(
	'post_type' => array('assignments'),
	'posts_per_page'=>1,
	'tax_query' => array(array('taxonomy' => 'assignmentscases', 'field'=>'slug', 'terms' =>'cases'))  
);
$recentPosts=new WP_Query($args);
//while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
if($recentPosts->have_posts()){
	for($i=0; $i<1; $i++){
		$recentPosts->the_post();
		if(!empty(get_the_ID())){
			$bidder_username = get_post_meta($post->ID, '_htx_ass_winning_bidder', true);
			$bidder_userid = get_user_by('login', $bidder_username)->ID;
			$shopid_query = "SELECT ID, guid FROM htx_posts WHERE post_author='{$bidder_userid}' AND post_type='shops'";
			$shopid_result = $wpdb->get_row($shopid_query);
			$shop_id = $shopid_result->ID;
			$shop_title = get_post_meta( $shop_id, '_htx_shop_name', true );
			$shop_tit = mb_substr($shop_title, 0, 14,'utf-8');
			$shop_logo = get_post_meta( $shop_id, '_htx_shop_logo', true );
			$shop_link = $shopid_result->guid;
?>                                
                        
                        <div class="rem-box mt20">
                            <div class="rem-img">
                                <a href="<?php the_permalink(); ?>" target="_blank" title="查看任务-<?php the_title(); ?>">
                                	<img src="/p/images/ass-fanben-txt.jpg" alt="">
                                    <span class="span">标</span>                                    
                                </a>
                            </div>
                            <div class="rem-price">￥<?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?>
                            		<span class="allwancheng">圆满完成</span>
                            </div>                           
                            <div class="rem-name"><a target="_blank" title="查看任务-<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo excerpttitle(18); ?></a></div>
                            <div class="rem-type layui-clear">
                                <span class="fl"><?php $bid_args = array('type'	=> 'bid', 'post_id' => get_the_ID(), 'count' => true); echo get_comments($bid_args); ?>人投标</span>
                                <span class="fr"><a rel="nofollow" style="background:none; border:hidden;" title="查看中标服务商-<?php echo $shop_title; ?>" href="<?php echo $shop_link; ?>"><img width="38" height="38" style="position:relative; top:-3px;" src="<?php echo $shop_logo; ?>" /></a> 中标</span>
                            </div>
                        </div>
<?php
		}
	}
}
//endwhile;	//loop2 end  
wp_reset_postdata();
?> 
                                               
                        <div class="htx-ads mt20">
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