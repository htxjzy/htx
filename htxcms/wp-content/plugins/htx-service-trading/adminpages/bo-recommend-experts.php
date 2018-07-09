<?php
function bo_recommend_experts(){  
   	
	add_submenu_page( 'edit.php?post_type=experts', '分配专家', '分配专家', 'publish_pages', 'bo_recommend_experts_slug', 'bo_recommend_experts_display' ); 
		
}     
function bo_recommend_experts_display(){ 
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-layui', home_url().'/layui/css/layui.css' );
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-basic-menu', home_url().'/p/css/admin/bo-recommend-experts.css?ver=1.2');

	global $wpdb;
 	$userid = get_post($_GET['assid'])->post_author;	
	$idquery = "SELECT ID FROM htx_posts WHERE post_type='experts' AND post_author='{$userid}'";
	$id_result = $wpdb->get_row($idquery); 			
	$sameuserid_exp_id = $id_result->ID;			
?>
<div class="statwrap">
<fieldset class="layui-elem-field">
  <legend>分配专家</legend>
  <div class="layui-field-box">
<form class="layui-form" action="">
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <div class="layui-form-item">
  <input type="hidden" name="ass_id" value="<?php echo $_GET['assid']; ?>" />
  <h2 class="subtitleh2">请为已缴来服务费[<span>￥<?php echo number_format((float)get_post_meta($_GET['assid'], '_htx_ass_accept_fee', true), 2); ?></span>]的所属类为【<span><?php $termArr = wp_get_object_terms($_GET['assid'], 'assignmentstax', array('fields' => 'names')); echo $termArr[0]; ?></span>】的任务【<span><?php $ass_id=get_post($_GET['assid'])->ID; $ass_title=get_post($_GET['assid'])->post_title; echo $ass_id.'-'.$ass_title; ?></span>】指定候选的专家:</h2>
  <?php if(!empty($sameuserid_exp_id)) echo '<p class="tishi">备注：不能填入ID为 <span>'.$sameuserid_exp_id.'</span> 的专家号，因为此号和该任务同属一个用户所有。最多只能选 <span>5 </span>位候选专家。</p>'; ?>
  <div id="submitExp"></div>
  </div>  
  <div class="layui-form-item">
    <label class="layui-form-label">专家ID 【01】</label>
    <div class="layui-input-block">
      <input type="text" name="experts[]" value="" lay-verify="required|positiveInteger" placeholder="输入只能是数字" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">专家ID 【02】</label>
    <div class="layui-input-block">
      <input type="text" name="experts[]" value="" lay-verify="positiveInteger" placeholder="输入只能是数字" class="layui-input">
    </div>
  </div>
 
  <div class="layui-form-item">
    <label class="layui-form-label">专家ID 【03】</label>
    <div class="layui-input-block">
      <input type="text" name="experts[]" value="" lay-verify="positiveInteger" placeholder="输入只能是数字" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">专家ID 【04】</label>
    <div class="layui-input-block">
      <input type="text" name="experts[]" value="" lay-verify="positiveInteger" placeholder="输入只能是数字" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">专家ID 【05】</label>
    <div class="layui-input-block">
      <input type="text" name="experts[]" value="" lay-verify="positiveInteger" placeholder="输入只能是数字" class="layui-input">
    </div>
  </div> 
  <div class="layui-form-item">

  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formsetting">提交设置</button>
    </div>
  </div>
</form>        
  </div>
</fieldset>
</div><!--.statwrap end-->
<script src="/layui/layui.js"></script>
<script>
//Tab relys on the element module
layui.use(['jquery', 'element', 'form'], function(){
	var $ = layui.$; 
  	var element = layui.element
    ,form = layui.form
	,layer2 = layui.layer;

	  //Custom validation rules
	  form.verify({
		positiveInteger: function(value){
			if(!(value.match(/^\+?[1-9][0-9]*$/)||value=="")){
				return '请输入正整数';
			}
			return false;				
		},
		difname: function(value){
			if(!(value=="<?php echo $sameuserid_exp_id; ?>")){
				return '和任务同一个用户ID的专家不能作为候选专家';
			}
			return false;				
		}		
	  });
	
	var submitUrl = "/other/dataproccess";
	form.on('submit(formsetting)', function(data){
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				//layer.msg(JSON.stringify(rdata));	
				$("#submitExp").empty().append(rdata.candidates);
				layer.msg(rdata.reg);																			
			}
		});
		return false;

	});//formsetting end
});
</script>
<?php
if(!empty(get_post_meta($_GET['assid'], '_htx_ass_exp_selected', true ))){
?>
<script>
layui.use('layer', function(){ 
 	var $ = layui.$ 
  	,layer = layui.layer;
	layer.open({
		title: false,
		area: '330px',
		content:"雇主已选定把关的专家。 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe60c;</i>",
		yes: function(index, layero){
			//do something
			window.location.href="/htxcms/wp-admin/edit.php?post_type=assignments"; 
			layer.close(index); 
		},
		cancel: function(index, layero){
			//do something 
			window.location.href="/htxcms/wp-admin/edit.php?post_type=assignments"; 
			layer.close(index);
		}    
	});  
});
</script>
<?php
}else{
	if(empty(get_post_meta($_GET['assid'], '_htx_ass_accept_fee', true))){
?>		
<script>
layui.use('layer', function(){ 
 	var $ = layui.$ 
  	,layer2 = layui.layer;
	layer2.open({
		title: false,
		area: '430px',
		content:"请在任务菜单列表中找出需要提供专家候选人的任务记录，点击对应的“已收费”列的金额数，进入页面来分配专家。 <i class=\"layui-icon\" style=\"font-size:30px; color:#FF5722;\">&#xe60c;</i>",
		yes: function(index, layero){
			//do something
			window.location.href="/htxcms/wp-admin/edit.php?post_type=assignments"; 
			layer2.close(index); 
		},
		cancel: function(index, layero){
			//do something 
			window.location.href="/htxcms/wp-admin/edit.php?post_type=assignments"; 
			layer2.close(index);
		}    
	});  
});
</script>
<?php
	}//end if(empty)
}//end else
}//end function bo_recommend_experts_display()  
add_action('admin_menu', 'bo_recommend_experts');
?>