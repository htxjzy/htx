<div class="bidwrap2">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
<div class="layui-row layui-col-space20">
    <div class="layui-col-sm9">
        <div class="edit-location"><!--<i class="layui-icon">&#xe715;</i>-->当前位置：<a href="<?php echo home_url(); ?>/htxcms/wp-admin/admin.php?page=bo_bid_menu_slug" title="返回列表">投标帖子列表</a> &gt; </div>
        <h1>ID为 <span><?php echo $bid_id; ?></span> 投标帖子</h1>
        <div class="bid_edit_box">
<?php
	$comment = get_comment($bid_id);	
	$user_id = $comment->user_id;
	$user = get_user_by( 'id', $user_id );
	$bidder = $user->user_login;
	$mobile = get_user_meta($user_id, 'custom_user_mobile', true);
	$email = $user->user_email;			
	$bid_for_id = $comment->comment_post_ID;;
	$bid_for_name = get_post($bid_for_id)->post_title;
	$termsArr = wp_get_object_terms($bid_for_id, 'assignmentstax', array('fields'=>'names') );
	$termname = $termsArr[0];
	$comment_date = $comment->comment_date;	
	$comment_approved = $comment->comment_approved;
	$status = $comment_approved ? '已通过':'<span>待审核</span>';
 
	$bid_price		 		= get_comment_meta( $bid_id, '_bid_price', true );		
	$bid_work_period 		= get_comment_meta( $bid_id, '_bid_work_period', true );
	$bid_desc 				= get_comment($bid_id)->comment_content;
	$final_editor			= get_currentuserinfo()->user_login;
?>
	<table class="custom_table">
        <!--<tr>
            <td>服务报价(元)</td>
            <td><input type="text"  name="bid_price" id="bid_price" value="<?//php echo $bid_price; ?>" /></td>
        </tr>-->
        <tr>
            <td>服务报价(元)</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $bid_price; ?></div></td>
        </tr>
        <tr>
            <td>工作周期<span>（服务天数）</span></td>
            <!--<td><input type="text"  name="bid_work_period" id="bid_work_period" value="<?//php echo $bid_work_period; ?>"/></td>-->
            <td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $bid_work_period; ?></div></td>
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
			<div style="width:100%;"><script id="editor" name="bid_desc" type="text/plain" style="width:100%; height:320px;"><?php echo $bid_desc; ?></script></div>            
            </td>
        </tr>
<script type="text/javascript">
    var ue = UE.getEditor('editor');	//ue2 is an operable object		
</script> 
        <tr>
            <td>投标者</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $bidder; ?></div></td>
        </tr>
        <tr>
            <td>手机</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $mobile; ?></div></td>
        </tr>
        <tr>
            <td>邮箱</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $email; ?></div></td>
        </tr>
        <tr>
            <td>标的ID</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $bid_for_id; ?></div></td>
        </tr>
        <tr>
            <td>标的名</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo '<a class="bidforid" title="查看所投的任务" target="_blank" href="/assignment/'.$bid_for_id.'.html">'.$bid_for_name.'</a>'; ?></div></td>
        </tr>
        <tr>
            <td>标的类</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $termname; ?></div></td>
        </tr>
        <tr>
            <td>投标时间</td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo $comment_date; ?></div></td>
        </tr>
<?php 
	if(!empty(get_comment_meta($bid_id, '_bid_modified', true))) 
	echo '<tr><td>发布时间</td><td><div class="disabled_update" style="border:1px solid #ccc">'.get_comment_meta($bid_id, '_bid_modified', true).'</div></td></tr>'; 
?>
        <tr>
            <td>终编者<span>（最后编辑审核人）</span></td><td><div class="disabled_update" style="border:1px solid #ccc"><?php echo get_comment_meta( $bid_id, '_final_editor', true ); ?></div></td>
            <input type="hidden"  name="final_editor" value="<?php echo $final_editor; ?>" />
        </tr>
    </table>

        </div><!--.bid_edit_box end-->
    </div>
    <div class="layui-col-sm3">
        <div class="operabox">
        	<h2>操作</h2>
        	<p>目前投标帖子状态：<?php echo $status; ?></p>

<?php 
	if(empty(get_comment($bid_id)->comment_approved)) 
	echo '<div class="operabutton"><a class="bidsave" save_bid_id_for_bo="'.$bid_id.'" href="javascript:;">保 存</a><a class="bidapproved" pass_bid_id="'.$bid_id.'" href="javascript:;">通 过</a></div>'; 
?>       	
        </div>
    </div>
</div><!--.layui-row end-->
</div><!--.bidwrap end-->