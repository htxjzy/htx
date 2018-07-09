<?php get_header(); ?>
<?php 
date_default_timezone_set('prc'); 
?>
<link rel="stylesheet" href="/p/css/original_main.css?ver=1.2">
<style>
.click_in_favorite, .login_click_in_favorite{ color:#fff; background:#FF5722; padding:4px 10px; margin-left:20px; border-radius:6px; }
.click_in_favorite:hover, .login_click_in_favorite:hover{ color:#fff;  background:#FF8F38; }
.add_focus{color:#FF5722; margin-right:20px; }
.add_color{color:#FF5722;}
.iopenshop{ margin-top:15px; margin-left:15px; font-size:12px; color:#fff; background:#e4393c; padding:4px 10px; border-radius:6px; }
.iopenshop:hover{ color:#fff; background:#f74e52; }
</style>
<div class="wrap-for-s">
	<div class="dyn-nav dyn-nav-for-s">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <a href="/assignments">需求大全</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> 
<?php
 $namearr = wp_get_object_terms(get_the_ID(), 'assignmentstax', array('fields'=>'names')); 
 $cat_name = $namearr[0];  
 $namelink = get_the_term_list(get_the_ID(), 'assignmentstax', '', ',', '');
 $namelink = rtrim($namelink, ', ');
 echo $namelink;
 $bid_args = array(
	'type'			=> 'bid',
	//'status '	=> 'all', //default all
	'post_id' 		=> get_the_ID(),	
	'count' 		=> true //return only the count
 );
 $total_bid_num = get_comments($bid_args); 
?>
<i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <span><?php echo excerpttitle(32); ?></span>
         </blockquote>
    </div>

    <div class="task">
        <div class="layui-main">

            <div class="single pb10">
                <div class="htx-list layui-clear">
                    <div class="list-table">            
<fieldset class="layui-elem-field">
  <legend><i class="layui-icon" style="font-size:30px; color:#009688;">&#xe609;</i> <?php echo excerpttitle(32); ?></legend>
  <div class="layui-field-box">
	      <div class="task-show-center">
			<span>编号 <span class="add_focus"><?php the_ID(); ?></span></span>
            <!--<span>阅读数 3260</span>-->
            <span>投标数  <span class="add_focus"><?php echo $total_bid_num; ?></span></span>         
<?php 
if( is_user_logged_in()){
	$cur_user = $current_user->ID;		
	echo '<a class="click_in_favorite" ass_id="'.get_the_ID().'" user_id="'.$cur_user.'" href="javascript:;">收藏该任务</a>';	
}else{	
	echo '<a class="loginhtx login_click_in_favorite" href="javascript:;">收藏该任务</a>';
}

?>
            
          </div>
		  <div class="task-play">
          <span>
<?php 
 $namearr = wp_get_object_terms(get_the_ID(), 'assignmentsmode', array('fields'=>'names')); echo $namearr[0]; 
?>            
          </span><span>￥ <?php echo get_post_meta( $post->ID, '_htx_ass_fei', true ); ?></span><span>预算</span>
          </div>                           
          <div class="task-name">                        
             <p>
                <span><i class="layui-icon" style="font-size:20px; color:#FF5722; position:relative; top:3px;">&#xe60e;</i> 距投标截止期还有</span> <span><!--<i>05</i>天 <i>08</i>小时 <i>38</i>分钟-->
<?php
$ass_bid_end = get_post_meta( $post->ID, '_htx_ass_bid_end', true );
$distance = strtotime($ass_bid_end)-time();
if($distance>0){
	echo dtime3second($distance);
}else{
	echo "已过投标期";
}
?>                
                </span>
             </p>
          </div>
          <div class="htx-schedule">
            <div class="htx-progress bg-red">
          		<div class="box">
            		<span><?php the_time("Y-m-d"); ?></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">雇主发布需求</span>
                 </div>
          	</div>
            <div class="htx-progress bg-red">
          		<div class="box">
            		<span>截止期 <?php echo get_post_meta( $post->ID, '_htx_ass_bid_end', true ); ?></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">服务商投标</span>
                 </div>
          	</div>
<?php 
$termArr = wp_get_object_terms($post->ID, 'assignmentsstatus', array('fields' => 'ids')); 
$termid = $termArr[0]; 
if($termid==26){
?>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">雇主开标</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">服务商制作</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">完工验收</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">付款竣工</span>
                 </div>
            </div>            
<?php
}elseif($termid==27){ 
?>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">雇主开标</span>
                 </div>
            </div>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">服务商制作</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">完工验收</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">付款竣工</span>
                 </div>
            </div>            
<?php
}elseif($termid==28){ 
?>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">雇主开标</span>
                 </div>
            </div>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">服务商制作</span>
                 </div>
            </div>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">完工验收</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">付款竣工</span>
                 </div>
            </div>         
<?php
}elseif($termid==29){ 
?>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">雇主开标</span>
                 </div>
            </div>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">服务商制作</span>
                 </div>
            </div>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">完工验收</span>
                 </div>
            </div>
            <div class="htx-progress bg-red">
                 <div class="box">
                    <span></span>
                    <span class="bg-red"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-red">付款竣工</span>
                 </div>
            </div>         
<?php
}else{
?>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">雇主开标</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">服务商制作</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">完工验收</span>
                 </div>
            </div>
            <div class="htx-progress bg-gay">
                 <div class="box">
                    <span></span>
                    <span class="bg-gay"><i class="layui-icon">&#xe602;</i> </span>
                    <span class="bc-gay">付款竣工</span>
                 </div>
            </div>      
<?php 
}
?>
<?php
if(!empty(get_post_meta( $post->ID, '_htx_ass_winning_bidder', true ))){

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
<div class="showwinbidder">
    <a href="<?php echo $shop_link; ?>" target="_blank" title="查看中标商铺-<?php echo $shop_title; ?>"><img src="<?php echo $shop_logo; ?>" alt="中标者" /></a>
    <div style="clear:both"></div>
    <h3><?php echo $shop_tit; ?></h3>
    <img src="/p/images/zhongbiaoH100.png" alt="中标" />
</div>

<?php
}
?>                 
           </div><!--.htx-schedule end-->
           <div class="htx-project">
           	<div class="htx-project-top layui-clear">
<?php 
	if(!empty(get_user_meta($post->post_author, 'custom_user_avatar', true ))){
		$avatar_url = get_user_meta($post->post_author, 'custom_user_avatar', true );
	}else{
		$avatar_url = '/p/images/member/tx300grayccc.jpg';
	}
?>

            
            	<a class="htx-project-top-img" title="查看雇主" href="javascript:;">
                    <img src="<?php echo $avatar_url; ?>" alt="火天信服务商"/>
                </a>
                <div class="htx-project-top-text">
                	<p>雇主名 <?php echo get_userdata($post->post_author)->user_nicename; ?></p>
                    <p style="margin-top:10px;">要求服务商擅长 【<span class="add_color"><?php echo $cat_name; ?></span>】 </p>
                    <div class="layui-row layui-col-space15">
                    	<div class="layui-col-md8">
                    <fieldset class="layui-elem-field">
                      <legend>要求服务商所在地</legend>
                      <div class="layui-field-box">
<?php echo get_post_meta( $post->ID, '_htx_ass_must_provid', true ); ?> - <?php echo get_post_meta( $post->ID, '_htx_ass_must_cityid', true ); ?> - <?php echo get_post_meta( $post->ID, '_htx_ass_must_areaid', true ); ?>
                      </div>
                    </fieldset>
                    	</div>
                        <div class="layui-col-md4">
                    <fieldset class="layui-elem-field">
                      <legend>预计服务工期</legend>
                      <div class="layui-field-box">
<?php echo get_post_meta( $post->ID, '_htx_ass_project_timelimit', true ); ?> 天
                      </div>
                    </fieldset>                        
                        </div>
                    </div>                    

                </div>
            </div>
<table>
  <thead>
    <tr>
      <th>项目地址</th>
      <th>制作地址</th>
      <th>项目规模</th>
    </tr> 
  </thead>
  <tbody>
    <tr>
      <td><?php echo get_post_meta( $post->ID, '_htx_ass_url', true ); ?></td>
      <td><?php echo get_post_meta( $post->ID, '_htx_ass_make_url', true ); ?></td>
      <td><?php echo get_post_meta( $post->ID, '_htx_ass_scale', true ); ?></td>
    </tr>
  </tbody>
</table>
<blockquote class="layui-elem-quote">项目介绍</blockquote>
<?php echo $post->post_content; ?>
<blockquote class="layui-elem-quote">工作要求</blockquote>
<p><?php echo get_post_meta( $post->ID, '_htx_ass_work_demand', true ); ?></p>
<blockquote class="layui-elem-quote">资质要求</blockquote>
<p><?php echo get_post_meta( $post->ID, '_htx_ass_quali_demand', true ); ?></p>

          </div><!--.htx-project end-->
                        
  </div>
</fieldset>
<div style="height:8px"></div>
<?php
$the_single_ID = get_the_ID();
$the_single_author = $post->post_author;//used by below	
$cur_user = wp_get_current_user();
$cur_user_id = $cur_user->ID;

$args = array(
	'user_id' 		=> $cur_user_id,
	'type'			=> 'bid',
	'post_id' 	=> $the_single_ID,			
	'count' 		=> true //return only the count
);
$bid_num = get_comments($args);

if( is_user_logged_in()){
	
	if( $distance > 0 && $cur_user_id != $the_single_author && empty($bid_num) && empty(get_post_meta( $post->ID, '_htx_ass_winning_bidder', true )) && !current_user_can('publish_posts') ){
		include TEMPLATEPATH . '/s_inc_bid_enter.php';			 
	}
	
}else{
	echo '<a href="javascript:;" class="stranger-want-to-bid loginhtx">我要投标</a>';
}

if(!empty(get_post_meta( $post->ID, '_htx_ass_accept_fee', true ))){
	if( $cur_user_id == $the_single_author && empty(get_post_meta( $post->ID, '_htx_ass_exp_selected', true ))){
		include TEMPLATEPATH . '/s_inc_exp_candidates.php'; 		
	}else{
		if(!empty(get_post_meta( $post->ID, '_htx_ass_exp_selected', true ))){
		include(TEMPLATEPATH . '/s_inc_exp_selected.php'); 									
		}			
	}
}

?>                  
                        <div class="htx-tender htx-tender-bid">                            
                            <div class="htx-main-box">
                                <div class="task-state layui-clear bd_b">
                                    <div class="task-state-left">
                                        <span class="fl">投标数（<?php echo $total_bid_num; ?>） </span>
                                        <a class="active fl" href="javascript:;">全部</a>
                                        <!--<a class="fl" href="javascript:;" >中标(0)</a>-->
                                    </div>
                                    <!--<div class="fl fmid">
                                              <div class="title">只看至少</div>
                                              <div class=" layui-form fl">
                                                  <div class="layui-inline fl layui-inline-mid">
                                                      <select name="quiz">
                                                          <option value="all">所有信用等级</option>
                                                          <option>零级（请谨慎交易）</option>
                                                          <option>一级（请慎重交易）</option>
                                                          <option>二级（可选择交易）</option>
                                                          <option>三级（可安心交易）</option>
                                                      </select>
                                                  </div>
                                                  <div class="layui-inline positionre">
                                                  的投标商
                                                  </div>
                                              </div>
                                    </div>
                                    
                                    <div class="task-state-right">
                                        <div class="layui-form layui-clear">
                                            <span>只看 </span>
                                            <div class="layui-inline">
                                                <span class="bc-cbfa">诚信宝</span>
                                                <input type="checkbox" name="" lay-skin="primary" title="的投标商">
                                            </div>

                                        </div>
                                    </div>-->
                                </div>
                                <!--<div class="filterSlect layui-clear ">
                                    <div class="fl">
                                        <span class="Slectbox">
                                            <a class="crent" href="javascript:;" data-order="1">综合</a>
                                            <a class="up" href="javascript:;" data-order="2">投标时间<i></i></a>
                                            <a class="up" href="javascript:;" data-order="3">能力值<i></i></a>
                                            <a class="up" href="javascript:;" data-order="6">服务商信用值<i></i></a>
                                        </span>
                                    </div>
                                </div>-->
                                <div class="blk20"></div>
                                <div class="layui-clear">
                                   <div class="task-work-wrap">
<?php include(TEMPLATEPATH . '/s_inc_bid_list.php');  ?>
<form name="bidvalidform" id="bidvalidform" method="post" action="">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
</form>
<?php
	$cur_url = home_url().'/assignment/'.get_the_ID().'.html';
	$format = $cur_url.'?cmpage=%#%';

	$approve_bid_args = array(
		'type'			=> 'bid',
		'status'		=> 'approve',
		'post_id' 		=> get_the_ID(),	
		'count' 		=> true //return only the count
	);
	$total = get_comments($approve_bid_args);

	// Get the current page
	$current_page  = max( 1, $paged );
	//$max_num_pages = intval( $total / $number ) + 1;
	if($total % $number ==0){
		$max_num_pages = intval( $total / $number );	
	}else{
		$max_num_pages = intval( $total / $number ) + 1;
	}		
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
		echo '<div class="posts-nav"><div id="tdpage">'.paginate_links($args).'</div></div>';
	}
?>
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
	'post__not_in' 	=> array(get_the_ID()),
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
<script>
var postUrl = "/other/dataproccess";
$("a.click_in_favorite").click(function(){
		var ass_id = $(this).attr("ass_id");
		var user_id = $(this).attr("user_id");
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();	
		var postData = {
				favorite_the_ass_id: ass_id,
				user_id: user_id,
				htx_nonce_field_name: htx_nonce_field_name,			
			}		
		layui.use('layer', function(){
			var layer = layui.layer;	
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
							//location.reload();
							layer.close(index); 
						},
						cancel: function(index, layero){
							//do something 
							//location.reload();
							layer.close(index);
						}    
					});     
				}
			});	//$.ajax end	  
			layer.close(index);
		});//layui.use end  

});	// end a.click_in_favorite

var curUrl = window.location.search;
if(curUrl.length != 0 ){
    $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $cur_url; ?>");
	if(curUrl=="?cmpage=2"){ $("#tdpage .page-numbers:nth-child(1)").attr("href", "<?php echo $cur_url; ?>"); }
}

$(document).ready(function(){
	$(".list-table .exp_candidates .exp_can_box .canwrap a#candidateyes").click(function(){
		$(this).parent().find(".hidden-display-box").toggle('normal'); 
		if($(this).hasClass("downbutton")){
			$(this).removeClass("downbutton").addClass("upbutton");
			$(this).attr("title","收缩");
		}else{
			$(this).removeClass("upbutton").addClass("downbutton");
			$(this).attr("title","展开");
		}	
	});
});


$("a.wincandidate").click(function() {
	var vinCanId = $(this).attr("wincan_id");
	var ThisAssId = $(this).attr("this_ass_id");	//Must be defined first
	layui.use('layer', function(){
		var layer2 = layui.layer;
		layer2.confirm('确定选TA把关吗?', {icon:3, title:false}, function(index){
			//do something
			$.ajax({
				type:"post",
				url:"/other/dataproccess",
				data:{
					"htx_nonce_field_name":document.bidvalidform.htx_nonce_field_name.value,
					"wincan_id":vinCanId,
					"this_ass_id":ThisAssId		
				},
				success:function(data) {
					layer2.open({
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
			layer2.close(index);
		});//layer2.confirm end   
	});//layui.use end      
	
});	//click a.wincandidate end	


$("a.winbidder").click(function() {
	var cpostId = $(this).attr("cpostid");
	var authorId = $(this).attr("authorid");
	layui.use('layer', function(){
		var layer = layui.layer;
		layer.confirm('确定选TA中标吗?', {icon:3, title:false}, function(index){	
			$.ajax({
				type:"post",
				url:"/other/dataproccess",
				data:{
					"htx_nonce_field_name":document.bidvalidform.htx_nonce_field_name.value,
					"cpostid":cpostId,
					"authorid":authorId
				},
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
});	//click a.winbidder end	
</script>
<?php get_footer(); ?>