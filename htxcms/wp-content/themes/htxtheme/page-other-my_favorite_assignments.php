<?php 
/*
Template Name: 任务收藏
*/
?>
<?php 
include TEMPLATEPATH . '/header.php'; 
?>	
<link rel="stylesheet" href="/p/css/member.css">
<style>
.start_time{ color:#FF5722; text-align:center; }
.cancel-att{ display:block; width:66px; padding:3px 0; font-size:12px; margin:0 auto; text-align:center; background:#5FB878; color:#fff; border-radius:6px; }
.cancel-att:hover{ color:#fff; background:#009688; }
.add-color{color:#FF5722;}
tr.add_bold th{ font-weight:bold;  }
.pnotice{ margin:10px 0; color:#898989; font-size:14px; }
</style>
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
	$(".layui-main .layui-clear > .user-left > ul li.c-collect dl dd:nth-child(1) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">

			<div class="htx-box htx-box-send-ass">
<?php 
if(is_user_logged_in()){
	//wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' );	
	$cur_user = $current_user->ID;
	$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;	
	$cur_url = home_url().'/other/my_favorite_assignments';			
	$number = 20;
	$offset = ( $paged - 1 ) * $number;
		
	$favorite_postid_query = " SELECT comment_post_ID FROM htx_comments WHERE comment_type='favorite' AND user_id='{$cur_user}' ";
	$favorite_postid_arrays = $wpdb->get_results($favorite_postid_query);
	if(!empty($favorite_postid_arrays)){
		foreach($favorite_postid_arrays as $favorite_post){
			$favorite_post_ids[] = $favorite_post->comment_post_ID;
		}
		
		$args=array(
			'post_type' 	=> array('assignments'),
			'post__in'		=> $favorite_post_ids,	
			'posts_per_page'=> $number,
			'offset' 		=> $offset
		);			
		$format = $cur_url.'?cpage=%#%';
		$alink = $cur_url;	
		$recentPosts=new WP_Query($args);	
		$total = $recentPosts->found_posts;	
	}else{ $total=0; }
}	//end is user logged in
?>       
                <h3>
                    <b class="bc-red">任务收藏</b><span style="margin-left:20px;">共 <span style="color:#e4393c;"><?php echo $total; ?></span> 个任务</span>
                    <!--<span class=" layui-form fr">
                        <span class="layui-inline w200 mr0 fl">
                            <input type="text" name="title" required="" lay-verify="required" placeholder="请输入关键字" autocomplete="off" class="layui-input">
                        </span>
                        <span class="layui-inline mr0 fl">
                            <button class="layui-btn layui-btn-danger" lay-submit="" lay-filter="formDemo">
                                <i class="layui-icon" style="font-size:18px; color:#fff;"></i>搜索
                            </button>
                        </span>
                    </span>-->
                </h3>
                <div class="htx-table" style="padding-top:0;">
                	<p class="pnotice">备注：最多只能收藏 <span class="add-color">20</span> 个任务, 超过可先取消关注状态过期的任务。</p>
                    <table class="layui-table"  lay-skin="lg">
                        <colgroup>
                            <col width="50%">
                            <col>
                        </colgroup>
                        <thead>
                        <tr class="add_bold">
                            <th>任务编号/标题</th>
                            <th>任务金额</th>
                            <th>任务类型</th>
                            <th>任务状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
if(is_user_logged_in()){
	if(!empty($favorite_postid_arrays)){	
		while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop start
			$postid = $post->ID;
			$post_link = get_the_permalink($postid);
			$title = $post->post_title;
			$ass_fee= number_format((float)get_post_meta($postid, '_htx_ass_fei', true), 2);
			
			$namesArr = wp_get_object_terms($postid, 'assignmentstax', array('fields'=>'names')); 
			$ass_cat = $namesArr[0];
			$namesArr = wp_get_object_terms($postid, 'assignmentsstatus', array('fields'=>'names')); 
			$ass_status = $namesArr[0];
			
			$operate = '<a class="cancel-att" favorite_ass_id="'.$postid.'" favorite_user_id="'.$cur_user.'" title="取消收藏" href="javascript:;">取消关注</a>';
												
			echo '<tr><td><span class="spanid">'.$postid.'</span> <h2><a title="'.$title.'" href="'.$post_link.'" target="_blank">'.$title.'</a></h2></td><td><span class="bc-red">￥'.$ass_fee.'</span></td><td>'.$ass_cat.'</td><td><span class="add-color">'.$ass_status.'</span></td><td>'.$operate.'</td></tr>';		
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
				echo '<tr><td id="tdpage" style="padding:15px 15px;" colspan="4">'.paginate_links($args).'</td></tr>';
			}	
	}else{
		echo '<tr><td colspan="5"><div class="layui-none-information"><i></i><span>暂时没有收藏任务</span></div></td></tr>';
	}

//echo '<tr><td colspan="4"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';
}	//end is user logged in
?>
<script>
var postUrl = "/other/dataproccess";
$("a.cancel-att").click(function() {
	var delFavoriteId = $(this).attr("favorite_ass_id");
	var favorite_user_id = $(this).attr("favorite_user_id");
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
	var postData = {
			delete_favorite_ass_id:delFavoriteId,
			favorite_user_id: favorite_user_id,
			htx_nonce_field_name:htx_nonce_field_name							
		}
	layui.use('layer', function(){
		var layer = layui.layer;
		layer.confirm('确定取消关注ID为 '+delFavoriteId+' 的任务吗?', {icon:3, title:false}, function(index){
			//do something
			$.ajax({
				type:"post",
				url: postUrl,
				data: postData,
				success:function(data) {
					layer.open({
						title: false,
						content: data,
						yes: function(index, layero){
							//do something
							location.reload();
							layer.close(index); 
						},
						cancel: function(index, layero){
							//do something 
							location.reload();
							layer.close(index);
						}    
					});     
				}
			});	//$.ajax end	  
			layer.close(index);
		});//layer.confirm end   
	});//layui.use end      
	
});	//	end click cancel-att 

var curUrl = window.location.search;
if(curUrl.length != 0 ){
    $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $cur_url; ?>");
	if(curUrl=="?cmpage=2"){ $("#tdpage .page-numbers:nth-child(1)").attr("href", "<?php echo $cur_url; ?>"); }
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


