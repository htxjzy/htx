<?php get_header(); ?> 
<link rel="stylesheet" href="/p/css/main.css">
	<a class="banner_box" style="background:url(/p/images/bannerlist.jpg) center top no-repeat;" href="#"></a>
<div class="wrap-for-s">
<?php include TEMPLATEPATH.'/t_inc_nav_box.php'; ?>
<div class="dyn-nav dyn-nav-for-s">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <a href="/assignments">需求大全</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <span>
<?php 
$cur_url = $_SERVER['REQUEST_URI'];
$endPos=strrpos($cur_url, "/");  
$cur_slug=substr($cur_url, $endPos+1);  
switch($cur_slug){
	case 'auditing':
		$name = '审核';	
		break;			
	case 'tendering':
		$name = '招标';	
		break;
	case 'bidopening':
		$name = '开标';	
		break;
	case 'making':
		$name = '制作';	
		break;
	case 'finished':
		$name = '完工';	
		break;
	case 'completed':
		$name = '竣工';	
		break;					
}
echo $name;
?>        
        </span></blockquote>
    </div>
    <!--当前位置 end-->
    <div class="task">
        <div class="layui-main">
            <div class="single pb10">
                <div class="htx-list layui-clear">
                    <div class="list-table">
                        <!--<div class="htx-term layui-clear">
                            <div class="htx-term-list">
                                <a href="javascript:;" class="cur">全部</a>
                                <a href="javascript:;">发布时间</a>
                                <a href="javascript:;">剩余时间</a>
                                <a href="javascript:;">投标数</a>
                                <a href="javascript:;">预算费</a>                        
                                <span class="region">
                                <i>所有地区</i>
                                <div class="all_region">
                                <a href="javascript:;">广西</a>
                                <a href="javascript:;">广东</a>
                                <a href="javascript:;">云南</a>
                                <a href="javascript:;">浙江</a>
                                <a href="javascript:;">湖南</a>
                                <a href="javascript:;">西藏</a>
                                <a href="javascript:;">江西</a>
                                <a href="javascript:;">山东</a>
                                <a href="javascript:;">海南</a>
                                <a href="javascript:;">江苏</a>
                                <a href="javascript:;">内蒙古</a>
                                <a href="javascript:;">陕西</a>
                                </div>
                                </span>

<script>
$(function () {
	$(".region").hover(function(){
		$(this).find('div').show()
		},function() {
		$(this).find('div').hide()
	});

    $('.all_region a').on('click',function () {
        var $this = $(this);
        var text = $this.text();
        $this.parent().prev().text(text);
		$(".all_region").hide(200);
    });
});
</script>
                            </div>
                            <div class="htx-term-search">
                                <div class="quick_search fl">
                                    <input type="text" id="search" placeholder="请输入财务服务类中的标题关键词">
                                </div>
                                <div class="quick_search_btn">
                                    <button class="layui-btn layui-btn-danger">
                                        <i class="layui-icon"></i>搜索
                                    </button>
                                </div>
                            </div>
</div>-->
                            <table>
                                <thead>
                                <tr>
                                    <th>预算服务费-任务标题<!-- / 浏览人数--> <br/> 投标数</th>
                                    <th>任务模式 <br/> 距投标截止期</th>
                                    <th>我要操作</th>
                                </tr>
                                </thead>
                                <tbody>
<?php 
$cur_url = home_url().'/assignmentsstatus/'.$cur_slug;
$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;
$number = 12; //Need to be consistent with the wp BO definition
$args=array(
	//'post_type' => get_post_type(),
	'post_type' => array('assignments'),
	'posts_per_page'=>$number,
	'paged' 	=> $paged,
	'tax_query' => array(array('taxonomy' => 'assignmentsstatus', 'field'=>'slug', 'terms' =>$cur_slug))        
);
$recentPosts=new WP_Query($args);
$total = $recentPosts->found_posts;
$format = $cur_url.'?cpage=%#%';
$alink = $cur_url;
while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
?>
                                <tr>
                                    <td>
                                        <a href="<?php the_permalink(); ?>" title="查看任务-<?php the_title(); ?>">
                                            <span>￥ <?php echo number_format((float)get_post_meta($post->ID, '_htx_ass_fei', true), 2); ?></span>
                                            <span><?php echo excerpttitle(20); ?></span>
                                        <div><!--14520人浏览 / --><?php $bid_args = array('type'	=> 'bid', 'post_id' => get_the_ID(), 'count' => true); echo get_comments($bid_args); ?> 人投标</div>
                                        </a>
                                    </td>
                                    <td>
										<p>
<?php 
$mode_namesarr =  wp_get_object_terms(get_the_ID(), 'assignmentsmode', array('fields'=>'names')); 
echo $mode_namesarr[0];
?>                                                                              
                                        </p>
                                        <div><i class="layui-icon" style="font-size:20px; color:#FF5722; position:relative; top:2px;">&#xe60e;</i> 还有
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
                                        
                                        </div>
                                    </td>
                                    <td><a href="/other/submission" target="_blank" title="去发布">我有类似需求</a></td>
                                </tr>
<?php 
endwhile;	//loop2 end  
wp_reset_postdata();
?> 
                                                                                                  
                                </tbody>
                            </table>
<?php include(TEMPLATEPATH . '/a-paging-box.php'); ?>                 
                    </div>
<div class="list-user-box">
<?php include(TEMPLATEPATH . '/sidebar_one.php');  ?>
                        <a style="display:none;" class="htx-adv-as mt20">
                        	<img src="/p/images/adh90.jpg" />
                        </a>
                    </div><!--.list-user-box end-->                    
                </div>
                

            </div>
        </div>
    </div>
</div><!--.wrap-for-s end-->
<?php get_footer(); ?>