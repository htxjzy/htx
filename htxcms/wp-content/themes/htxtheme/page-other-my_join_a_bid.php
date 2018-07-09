<?php 
/*
Template Name: 投标帖子
*/
?>
<?php 
include TEMPLATEPATH . '/header.php'; 
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
	$(".layui-main .layui-clear > .user-left > ul li:nth-child(3) dl dd:nth-child(2) a").addClass("active");
	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right"> 
<?php
if(is_numeric($_GET['bid_id']) && !empty($_GET['bid_id'])){	
	$bid_id 			= $_GET['bid_id'];
	$comment 			= get_comment($bid_id);
	$bid_price		 	= get_comment_meta( $bid_id, '_bid_price', true );		
	$bid_work_period 	= get_comment_meta( $bid_id, '_bid_work_period', true );
	$bid_desc 			= get_comment($bid_id)->comment_content;
	$final_editor		= get_currentuserinfo()->user_login;
	$comment_approved   = $comment->comment_approved;
}

?>   
			<div class="htx-box htx-box-my-abid">  
            	<div class="edit-location">当前位置：<a href="/other/my_join_assignments" title="返回我参与的任务">我参与的任务</a> &gt; </div>
        		<h3>ID为 <span class="bc-red"><?php echo $bid_id; ?></span> 投标帖子:</h3>
                <div class="htx-table htx-table-abid" style="padding-top:0;">
<form id="bidform">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>     
<table class="custom_table">
        <!--<input type="hidden"  name="final_editor" value="<?//php echo $final_editor; ?>" />-->
        <input type="hidden"  name="save_bid_id" value="<?php echo $bid_id; ?>" />
        <tr>
            <td>服务报价(元)</td>
            <td><input type="text"  name="bid_price" id="bid_price" value="<?php echo $bid_price; ?>" /></td>
        </tr>
        <tr>
            <td>工作周期<span>（服务天数）</span></td>
            <td><input type="text"  name="bid_work_period" id="bid_work_period" value="<?php echo $bid_work_period; ?>"/></td>
            <!--<td><div class="disabled_update" style="border:1px solid #ccc"><?//php echo $bid_work_period; ?></div></td>-->
        </tr>
<script type="text/javascript">	
	document.getElementById("bid_price").onblur=function(){	
		if(!document.getElementById("bid_price").value.match(/^\+?[1-9][0-9]*$/)){ //If it is not a non - positive integer
			alert("请输入正整数");
			return false;
		}
	}
	
	document.getElementById("bid_work_period").onblur=function(){	
		if(!document.getElementById("bid_work_period").value.match(/^\+?[1-9][0-9]*$/)){ //If it is not a non - positive integer
			alert("请输入正整数");
			return false;
		}
	}
</script> 
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config2.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
        <tr>
            <td>项目介绍</td>
            <td style="padding-bottom:10px;">
			<div style="width:100%;"><script id="editor" name="edit_bid_desc" type="text/plain" style="width:100%; height:320px;"><?php echo $bid_desc; ?></script></div>            
            </td>
        </tr>
<script type="text/javascript">
    var ue = UE.getEditor('editor');	//ue2 is an operable object			
</script> 
</table>  
</form>       
<?php 
	if(empty($comment_approved)) 
	echo '<div class="operabutton"><a class="bidsave" href="javascript:;">保 存</a></div>'; 
?>
<script>



var postUrl = "/other/dataproccess";
$('a.bidsave').click(function(){
	layui.use('layer', function(){
		var layer = layui.layer;	
		$.ajax({
			type:"post",
			url: postUrl,
			data: $("#bidform").serialize(),
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
	});//layui.use end  
}); // end click a.bidsave
</script>       
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

