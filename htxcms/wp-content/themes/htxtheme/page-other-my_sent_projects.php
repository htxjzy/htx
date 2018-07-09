<?php 
/*
Template Name: 我委托的项目
*/
?>
<?php include TEMPLATEPATH . '/header.php'; ?>		
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(2) dl dd:nth-child(2) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
         
<div class="htx-box htx-box-send-ass">
<?php 
if(is_user_logged_in()){	
	$cur_user = $current_user->ID;
	
	$args_num_all=array(
		'author'		=> $cur_user,
		'post_type' 	=> array('projects'), 
		'post_status'	=>array('publish','draft'), 	
	);
	$posts_num_all=new WP_Query($args_num_all);
	$total_num_all = $posts_num_all->found_posts;

	$terms = array('auditing', 'making', 'finished', 'completed' );	
	foreach($terms as $term){
		$tax_query = array(
			array(
				'taxonomy'=>'projectsstatus',
				'field'    =>'slug',
				'terms'    =>$term,
			)
		); 	
		$args_num=array(
			'author'		=> $cur_user,
			'post_type' 	=> array('projects'), 
			'post_status'	=>array('publish','draft'), 
			'tax_query'		=>$tax_query,
	
		);
		$recentPosts_num=new WP_Query($args_num);
		$total_num[$term] = $recentPosts_num->found_posts;
	}
	
				
	$cur_url = home_url().'/other/my_sent_projects';			
	$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;	
	$number = 20;
	$offset = ( $paged - 1 ) * $number;	
			
	if(!empty($_GET['status'])){
		$get_value = trim($_GET['status']);	
		switch($get_value){
			case 'all':
				$args=array(
					'author'		=> $cur_user,
					'post_type' 	=> array('projects'),
					'post_status'	=>array('publish','draft'), 
					'posts_per_page'=>$number,
					'offset' 		=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=all&cpage=%#%';
				$alink = $cur_url.'?status=all';				
				break;			
			case 'auditing':
				$args=array(
					'author'		=> $cur_user,
					'post_type' 	=> array('projects'),
					'post_status'	=>array('draft'), 
					'posts_per_page'=>$number,
					'offset' 		=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=auditing&cpage=%#%';
				$alink = $cur_url.'?status=auditing';				
				break;	
			case 'making':
				$tax_query = array(
				   array(
					   'taxonomy'=>'projectsstatus',
					   'field'    =>'slug',
					   'terms'    =>'making',
				   )
   				);
				$args=array(
					'author'			=> $cur_user,
					'post_type' 		=> array('projects'),
					'post_status'		=> array('publish'), 
					'tax_query'			=> $tax_query,
					'posts_per_page'	=> $number,
					'offset' 			=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=making&cpage=%#%';
				$alink = $cur_url.'?status=making';				
				break;		
			case 'finished':
				$tax_query = array(
				   array(
					   'taxonomy'=>'projectsstatus',
					   'field'    =>'slug',
					   'terms'    =>'finished',
				   )
   				);
				$args=array(
					'author'			=> $cur_user,
					'post_type' 		=> array('projects'),
					'post_status'		=> array('publish'), 
					'tax_query'			=> $tax_query,
					'posts_per_page'	=> $number,
					'offset' 			=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=finished&cpage=%#%';
				$alink = $cur_url.'?status=finished';				
				break;		
			case 'completed':
				$tax_query = array(
				   array(
					   'taxonomy'=>'projectsstatus',
					   'field'    =>'slug',
					   'terms'    =>'completed',
				   )
   				);
				$args=array(
					'author'			=> $cur_user,
					'post_type' 		=> array('projects'),
					'post_status'		=> array('publish'), 
					'tax_query'			=> $tax_query,
					'posts_per_page'	=> $number,
					'offset' 			=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=completed&cpage=%#%';
				$alink = $cur_url.'?status=completed';				
				break;		

		}			
	}else{  //else status
				$args=array(
					'author'		=> $cur_user,
					'post_type' 	=> array('projects'),
					'post_status'	=>array('publish','draft'), 
					'posts_per_page'=>$number,
					'offset' 		=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=all&cpage=%#%';
				$alink = $cur_url.'?status=all';			
	}
}
?>
                <h3>
                    <b class="bc-red">我全托的项目</b>
                </h3>
                <div class="list_box">
                     
                    <div class="list_li">
                        <strong>项目状态：</strong>
                        <a <?php if($_GET['status']=='all' || empty($_GET['status'])) echo 'class="cur"'; ?> href="/other/my_sent_projects?status=all">所有（<span><?php echo $total_num_all; ?></span>）</a>
                        <a <?php if($_GET['status']=='auditing') echo 'class="cur"'; ?> href="/other/my_sent_projects?status=auditing">审核（<span><?php echo $total_num['auditing']; ?></span>）</a>
                        <a <?php if($_GET['status']=='making') echo 'class="cur"'; ?> href="/other/my_sent_projects?status=making">制作（<span><?php echo $total_num['making']; ?></span>）</a>
                        <a <?php if($_GET['status']=='finished') echo 'class="cur"'; ?> href="/other/my_sent_projects?status=finished">完工（<span><?php echo $total_num['finished']; ?></span>）</a>
                        <a <?php if($_GET['status']=='completed') echo 'class="cur"'; ?> href="/other/my_sent_projects?status=completed">竣工（<span><?php echo $total_num['completed']; ?></span>）</a>
                    </div>
                </div>
                <div class="htx-table" style="padding-top:0px;">
                    <table  class="layui-table"  lay-skin="nob">
                        <colgroup>
                            <col width="45%">
                            <col width="20%">
                            <col width="15%">
                            <col width="10%">
                            <col width="10%">
                            
                        </colgroup>
                        <thead>
                        <tr>
                            <th>项目编号/标题</th>
                            <th>项目金额</th>
                            <th>项目类型</th>
                            <th>项目状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
<?php 
if(is_user_logged_in()){		
	while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop start	 
?>                        
                        <tr>
                            <td>
                                <span class="spanid"><?php the_ID(); ?></span>
                                <h2><?php the_title(); ?></h2>
                            </td>
                            <td><span class="bc-red">￥<?php echo number_format((float)get_post_meta($post->ID, '_htx_pro_fei', true), 2); ?> </span></td>
                            <td><span>
<?php 
$namesArr = wp_get_object_terms($post->ID, 'assignmentstax', array('fields'=>'names')); 
echo $namesArr[0];
?>
                            </span></td>
                            <td><span>
<?php 
$namesArr = wp_get_object_terms($post->ID, 'projectsstatus', array('fields'=>'names')); 
echo $namesArr[0];
?>
                            </span></td>
                            <td><?php if($post->post_status == 'draft'){ echo '<a class="layui-btn layui-btn-small layui-btn-danger" style="height:32px; line-height:32px; border-radius:6px;" href="/other/edit_pro?edit_pro_id='.get_the_ID().'">编辑</a>'; }else{ echo '<p style="height:32px;"></p>'; }  ?></td>
                        </tr>                       
<?php
	endwhile;	//loop2 end  
	wp_reset_postdata();
	
	// Get the current page
	$current_page  = max( 1, $paged );
	$max_num_pages = ceil( $total / $number );			
	$pid = 9999999999999999; // need an unlikely integer
	$args = array(
		'base'         => get_permalink( $pid ) . '%_%',
		'format'       => $format,
		'current'      => $current_page,
		'total'        => $max_num_pages,
		'type'         => 'plain',
		'prev_text'    => __( '上一页' ),
		'next_text'    => __( '下一页' ),
		'end_size'     => 1,
		'mid-size'     => 2
	);				
	// 显示分页链接
	if(!empty(paginate_links($args))){
		echo '<tr><td id="tdpage" style="padding:15px 15px;" colspan="5">'.paginate_links($args).'</td></tr>';
	}

	if(!($recentPosts->have_posts()))
		echo '<tr><td colspan="5"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
	}
?>
<script>	
    var curUrl = window.location.search;
    var numValue = (curUrl.split("&")).length-1;
	var numofStr = (curUrl.split("2")).length-1;
    if(numValue >= 1){
        $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $alink; ?>");
    }
    if(numofStr==1){
        $("#tdpage .page-numbers:nth-child(1)").attr("href", "<?php echo $alink; ?>");
    }	
</script>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</article>
<?php include TEMPLATEPATH . '/footer.php'; ?>
<?php if(!is_user_logged_in()){ ?>
<script>	
layui.use('layer', function(){ 
		var $ = layui.$ 
		,layer = layui.layer;

		//layer.close(layer.index);
		layer.closeAll();
		layer.open({
			title: false,
			type: 1,
			content: $('#login-htx'),
			area: ['530px', '475px']
			,cancel: function(){ 
    			location.reload();
  			}			
		});				
});
</script>
<?php
} 
?>	

