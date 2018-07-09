<?php
function bo_bid_menu(){  
    add_menu_page( '投标帖子', '投标', 'publish_pages', 'bo_bid_menu_slug', 'display_bo_bid_menu', 'dashicons-sticky', 37 ); 	
}     
function display_bo_bid_menu(){ 
	global $wpdb;
?>
<link rel="stylesheet" href="/layui/css/layui.css">
<link rel="stylesheet" href="/p/css/admin/bo-bid-menu.css?ver=1.3" />
<script src='/p/js/jquery.min.js'></script>
<script src="/layui/layui.js"></script>
<?php 
	//$bid_id = $_GET['bid_id'];
if(is_numeric($_GET['bid_id'])){
	$bid_id = $_GET['bid_id'];
	$comment = get_comment($bid_id);
	if(!empty($comment)){
		include_once dirname(__FILE__).'/bo-bid-menu-edit.php';
	}else{
		include_once dirname(__FILE__).'/bo-bid-menu-list.php';	
	}	
}else{
	include_once dirname(__FILE__).'/bo-bid-menu-list.php';
}
?>
<!--paged start-->
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
<!--paged end-->

<script>
var postUrl = "/other/dataproccess";

$("a.deletebid").click(function() {
	var deleteBidId = $(this).attr("delete_bid_id");
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
	var postData = {
			delete_bid_id:deleteBidId,
			htx_nonce_field_name:htx_nonce_field_name							
		}
	layui.use('layer', function(){
		var layer = layui.layer;
		layer.confirm('确定删除ID为 '+deleteBidId+' 的投标帖子吗?', {icon:3, title:false}, function(index){
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
	
});	//	end click a.deletebid 


$('a.bidsave').click(function(){
	var saveBidId = $(this).attr("save_bid_id_for_bo");
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();	
	//var bid_price = $("input[name='bid_price']").val();
	//var bid_work_period = $("input[name='bid_work_period']").val();
	var update_bid_desc = ue.getContent();
	var final_editor = $("input[name='final_editor']").val();
	var postData = {
			save_bid_id_for_bo: saveBidId,
			htx_nonce_field_name: htx_nonce_field_name,
			//bid_price: bid_price,
			//bid_work_period: bid_work_period,
			update_bid_desc: update_bid_desc,
			final_editor: final_editor				
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


$("a.bidapproved").click(function() {
	
	var passBidId = $(this).attr("pass_bid_id");
	var final_editor = $("input[name='final_editor']").val();
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
	var postData = {
			pass_bid_id:passBidId,
			final_editor: final_editor,
			htx_nonce_field_name:htx_nonce_field_name							
		}
	layui.use('layer', function(){
		var layer = layui.layer;
		layer.confirm('确定批准ID为 '+passBidId+' 的投标帖子发布吗，发布后将不可撤回', {icon:3, title:false}, function(index){
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
	
});	//	end click a.deletebid 

$(document).ready(function(){	//滚动导航				
	$(document).on("scroll",function(){			
		if($(window).scrollTop()>120){ 			
		//alert(jQuery('.headermid').offset().top);				
			$(".bidwrap2 .layui-row .layui-col-sm3 .operabox").css({"margin-top":"600px"});				
		}else{
			$(".bidwrap2 .layui-row .layui-col-sm3 .operabox").css({"margin-top":"0px"});
		}								
	});						
});  


layui.use(['jquery', 'element', 'laydate', 'form'], function(){
	var $ = layui.$; 
  	var element = layui.element,
	laydate = layui.laydate,
    form = layui.form;	
	//执行一个laydate实例
  	laydate.render({
    	elem: '#inputdate' //指定元素
		,max: '<?php echo date('Y-m-d'); ?>'
  	});

});



/*function searchcheck(){
    if(document.getElementById('sfield').value==0){
        alert("请选择下拉菜单的条件后输入对应的关键词进行查询");  
        return false;      
    }else { return true; }
}*/
</script>
<?php
}  
add_action('admin_menu', 'bo_bid_menu');
?>