<?php
function bo_setting_basic_menu(){  
   	
	add_submenu_page( 'bo_setting_menu_slug', '基本设置', '基本设置', 'publish_pages', 'bo_setting_basic_menu_slug', 'bo_setting_basic_menu_display' ); 
		
}     
function bo_setting_basic_menu_display(){ 
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-layui', home_url().'/layui/css/layui.css' );
	wp_enqueue_style('htx-plugin-admin-seo-menu-css-basic-menu', home_url().'/p/css/admin/basic-menu.css');
?>
<div class="statwrap">
<fieldset class="layui-elem-field">
  <legend>联系我们设置</legend>
  <div class="layui-field-box">
<form class="layui-form" action="">
  <?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工程交易中心概述 【01】</label>
    <div class="layui-input-block">
      <textarea name="htx_platform_state" placeholder="请输入" class="layui-textarea"><?php echo get_option('htx_platform_state'); ?></textarea>
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">客服电话 【02】</label>
    <div class="layui-input-block">
      <input type="text" name="htx_service_phone" value="<?php echo get_option('htx_service_phone'); ?>" lay-verify="required" placeholder="请输入" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">客服QQ 【03】</label>
    <div class="layui-input-block">
      <input type="text" name="htx_service_qq" value="<?php echo get_option('htx_service_qq'); ?>" lay-verify="required" placeholder="请输入" class="layui-input">
    </div>
  </div>
 
<div class="layui-form-item layui-form-item-erweima">
  <label class="layui-form-label">微信服务号二维码 【04】</label> 
  <div class="layui-inline layui-inline-upimg"><img class="layui-upload-img" src="<?php echo get_option('htx_wxfw_erweima'); ?>" id="locaimg"><span id="shuoming">对应地址</span>
        <button type="button" class="layui-btn" id="img-upload">
          <i class="layui-icon" style="font-size:20px;">&#xe681;</i>图片上传
        </button>
  </div>  
  <div class="layui-inline" style="width:30%">
    <div class="layui-input-inline" style="width:100%">
      <input type="text" name="htx_wxfw_erweima" value="<?php echo get_option('htx_wxfw_erweima'); ?>" lay-verify="required" placeholder="请输入" class="layui-input">
    </div>
  </div>
</div>

<div class="layui-form-item">
  <label class="layui-form-label">微信订阅号二维码 【05】</label> 
  <div class="layui-inline layui-inline-upimg"><img class="layui-upload-img" src="<?php echo get_option('htx_wxdy_erweima'); ?>" id="locaimg2"><span id="shuoming">对应地址</span>
        <button type="button" class="layui-btn" id="img-upload2">
          <i class="layui-icon" style="font-size:20px;">&#xe681;</i>图片上传
        </button>
  </div>  
  <div class="layui-inline" style="width:30%">
    <div class="layui-input-inline" style="width:100%">
      <input type="text" name="htx_wxdy_erweima" value="<?php echo get_option('htx_wxdy_erweima'); ?>" lay-verify="required" placeholder="请输入" class="layui-input">
    </div>
  </div>
</div>

  <div class="layui-form-item">
    <div class="layui-input-block">
<p class="pnotice2">备注：图片（小于1M）上传格式（jpg | jpeg | png | gif）。</p>
    </div>
  </div>
 

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formsetting">保存设置</button>
    </div>
  </div>
</form>        
  </div>
</fieldset>
</div><!--.statwrap end-->
<script src="/layui/layui.js"></script>
<script>
//Tab relys on the element module
layui.use(['jquery', 'element', 'upload', 'form'], function(){
	var $ = layui.$; 
  	var element = layui.element
	,upload = layui.upload	
    ,form = layui.form;

	//Executing an uploaded images instance
	var uploadInst = upload.render({
		elem: '#img-upload' //Binding element
		,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
		,size: 1000 //Limit the size of the picture, unit KB
		/*,before: function(obj){
		  //According to the local picture, does not support IE8
		  obj.preview(function(index, file, result){
			$('#locaimg').attr('src', result); //Picture linking（base64）
		  });
		}*/
		,done: function(res){
		  //Upload finished callback
		  //If the upload failed
		  if(res.status > 0){
			return layer.msg('上传失败');
		  }
		  //Upload success	  
		  //layer.msg(JSON.stringify(res));
		  var imgUrl="/submission_upload/upfiles/"+res.message;
		  $('#locaimg').attr('src', imgUrl);
		  $("input[name='htx_wxfw_erweima']").attr('value', imgUrl); 
			  
		}
		,error: function(){
		  //Request an exception callback
		}
		
	});

	upload.render({
		elem: '#img-upload2' //Binding element
		,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
		,size: 1000 //Limit the size of the picture, unit KB
		/*,before: function(obj){
		  //According to the local picture, does not support IE8
		  obj.preview(function(index, file, result){
			$('#locaimg2').attr('src', result); //Picture linking（base64）
		  });
		}*/
		,done: function(res){
		  //Upload finished callback
		  //If the upload failed
		  if(res.status > 0){
			return layer.msg('上传失败');
		  }
		  //Upload success	  
		  //layer.msg(JSON.stringify(res));
		  var imgUrl="/submission_upload/upfiles/"+res.message;
		  $('#locaimg2').attr('src', imgUrl);
		  $("input[name='htx_wxdy_erweima']").attr('value', imgUrl); 
			  
		}
		,error: function(){
		  //Request an exception callback
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
				layer.msg(JSON.stringify(rdata));												
			}
		});
		return false;

	});//formNo1button end
});
</script>	

<?php
}  
add_action('admin_menu', 'bo_setting_basic_menu');
?>