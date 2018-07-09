<?php
function bo_users_menu(){  
    add_menu_page( '注册会员', '会员', 'publish_pages', 'bo_users_menu_slug', 'display_bo_users_menu', 'dashicons-id', 7 ); 	
}     
function display_bo_users_menu(){ 
global $wpdb;
?>
<link rel="stylesheet" href="/layui/css/layui.css">
<link rel="stylesheet" href="/p/css/admin/bo-users-list-menu.css?ver=1.0" />
<script src='/p/js/jquery.min.js'></script>
<script src="/layui/layui.js"></script>

<?php 
	date_default_timezone_set('prc'); 
	$args = array(
		'role' => 'Contributor'
	);
	$user_query = new WP_User_Query( $args );	
	$total = $user_query->get_total();
?>
<div class="userswrap">
<div class="divp">
	<span><b>会员列表</b></span><span>总共 <i><?php echo $total; ?></i> 条记录</span><a class="aall" href="/htxcms/wp-admin/admin.php?page=bo_users_menu_slug">查阅全部</a>
    <form class="search-date" method="post" action="/htxcms/wp-admin/admin.php?page=bo_users_menu_slug">
        <div class="layui-form-item">
            <label class="layui-form-label">日期</label>
            <div class="layui-input-inline">
            	<input type="text" name="inputdate" required lay-verify="required" id="inputdate" placeholder="请输入日期" autocomplete="off" class="layui-input">
            </div>    	
            <input name="sdate_submit" type="submit" value="查 询" title="查询" class="layui-form-mid layui-word-aux" />  	
        </div>
    </form>   
    <form class="search-keyword layui-form" method="post" action="/htxcms/wp-admin/admin.php?page=bo_users_menu_slug">       
      <div class="layui-form-item">
        <label class="layui-form-label">关键词</label>
        <div class="layui-input-inline" style="width:100px;">
          <select name="sfield" lay-verify="required">
            <option value="0">全部</option>
            <option value="1">ID</option>
            <option value="2">用户名</option>
            <option value="3">手机</option>
            <option value="4">邮箱</option>
          </select>
        </div>
        <input name="knum" type="hidden" value=""/>
        <div class="layui-input-inline" style="width:160px;">
          <input type="text" name="keyword" required  lay-verify="required" maxlength="30" placeholder="输入对应的搜索词" autocomplete="off" class="layui-input">
        </div>
      </div>            
     <input name="skeyword_submit" type="submit" value="搜 索" title="搜索" />
    </form>
    
</div>
<?php 
	wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); 
	$cur_url = home_url().'/htxcms/wp-admin/admin.php?page=bo_users_menu_slug';
	
	$paged = isset( $_GET[ 'cupage' ] ) ? $_GET[ 'cupage' ] : 1;
	$number = 30;
	$offset = ( $paged - 1 ) * $number;	
		
	if(isset($_POST['skeyword_submit'])  || $_GET['input']=='inputkeyword' ){	
		$keyword = trim($_POST['keyword']);	
		switch($_POST['sfield']){
			case 0:
				$_POST['knum']="全部";
				$args = array(
					'role' => 'Contributor',
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$user_query = new WP_User_Query( $args );	
				$total = $user_query->get_total();			
				break;			
			case 1:
				$_POST['knum']="ID";
				$args = array(
					'role' => 'Contributor',
					'search'         => $keyword,
					'search_columns' => array( 'ID' ),					
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$user_query = new WP_User_Query( $args );	
				$total = $user_query->get_total();					
				break;
			case 2:
				$_POST['knum']="用户名";
				$args = array(
					'role' => 'Contributor',
					'search'         	=> $keyword,
					'search_columns' 	=> array( 'user_login' ),		
					'number' 			=> $number,
					'offset' 			=> $offset						
				);
				$user_query = new WP_User_Query( $args );	
				$total = $user_query->get_total();										
				break;
			case 3:
				$_POST['knum']="手机";
				$args = array(
					'role' 			=> 'Contributor',
					'meta_key' 		=> 'custom_user_mobile',
					'meta_value' 	=> $keyword,		
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$user_query = new WP_User_Query( $args );	
				$total = $user_query->get_total();						
				break;
			case 4:
				$_POST['knum']="邮箱";
				$args = array(
					'role' 				=> 'Contributor',
					'search'         	=> $keyword,
					'search_columns' 	=> array( 'user_email' ),		
					'number' 			=> $number,
					'offset' 			=> $offset						
				);
				$user_query = new WP_User_Query( $args );	
				$total = $user_query->get_total();						
				break;					
		}	
		echo '<p>选择 【'.$_POST["knum"].'】 输入 <span>'.$_POST["keyword"].'</span> 对应的搜索结果有 <span>'.$total.'</span> 条， 记录如下：</p>';	
		$format = $cur_url.'&input=inputkeyword&cupage=%#%';
		$alink = $cur_url.'&input=inputkeyword';	
	
	
	}elseif(isset($_POST['inputdate']) || $_GET['input']=='inputdate' ){
		
		if(!empty($_POST['inputdate'])){		
			update_option("search_one_day", $_POST['inputdate']);
		}
		$sdate = get_option("search_one_day");
		
		$ymdArr = explode('-', $sdate); 	
		$date_query = array(
			'column' => 'user_registered',
			array(
				'year'  =>$ymdArr[0],
				'month'	=>$ymdArr[1],
				'day'   =>$ymdArr[2]
			)
		);
		
		$args = array(
			'date_query' 	=> $date_query,
			'role' 			=> 'Contributor',
			'number' 		=> $number,
			'offset' 		=> $offset						
		);
		$user_query = new WP_User_Query( $args );	
		$total = $user_query->get_total();			
							
		echo '<p>查询到 <span>'.$sdate.'</span> 日注册的会员有 <span>'.$total.'</span> 条， 记录如下：</p>';		

		$format = $cur_url.'&input=inputdate&cupage=%#%';
		$alink = $cur_url.'&input=inputdate';		
	}else{
		$args = array(
			'role' 			=> 'Contributor',
			'number' 		=> $number,
			'offset' 		=> $offset						
		);
		$user_query = new WP_User_Query( $args );	
		$total = $user_query->get_total();		
		$format = $cur_url.'&cupage=%#%';
		$alink = $cur_url;
	}
?>
<table class="userstable">
<tr><th>ID</th><th>用户名</th><th>昵称</th><th>手机</th><th>邮箱</th><th>注册时间</th><th>操作</th></tr>
<?php
	//$user_query = new WP_User_Query( $args );
	$user_arrs = $user_query->results;
	//users loop
	if(!empty($user_arrs)){
		foreach( $user_arrs as $user ){
			$user_id = $user->ID;
			$username = $user->user_login;
			$nickname = $user->nickname;			
			$mobile = get_user_meta($user_id, 'custom_user_mobile', true);
			$email = $user->user_email;
			$reg_time = $user->user_registered;	
			
echo '<tr><td>'.$user_id.'</td><td>'.$username.'</td><td>'.$nickname.'</td><td>'.$mobile.'</td><td>'.$email.'</td><td>'.$reg_time.'</td><td><a class="deleteuser" href="javascript:;" delete_user_id="'.$user_id.'">删除</a></td></tr>';
				
		}	
	}else{	
		echo '<tr><td colspan="7"><div class="layui-none-information"><i></i><span>暂时没有会员记录</span></div></td></tr>';
	}
					
		// Get the current page
		$current_page  = max( 1, $paged );
		//$max_num_pages = intval( $total / $number ) + 1;
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
			echo '<tr><td id="tdpage" colspan="11">'.paginate_links($args).'</td></tr>';
		}
	
?>
</table>
</div><!--.userswrap end-->






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

$("a.deleteuser").click(function() {
	var deleteuserId = $(this).attr("delete_user_id");
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
	var postData = {
			delete_user_id:deleteuserId,
			htx_nonce_field_name:htx_nonce_field_name							
		}
	layui.use('layer', function(){
		var layer = layui.layer;
		layer.confirm('确定删除ID为 '+deleteuserId+' 的会员吗?', {icon:3, title:false}, function(index){
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
	
});	//	end click a.deleteuser 


/*$('a.bidsave').click(function(){
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
	
});	//	end click a.deleteuser 

$(document).ready(function(){	//滚动导航				
	$(document).on("scroll",function(){			
		if($(window).scrollTop()>120){ 			
		//alert(jQuery('.headermid').offset().top);				
			$(".userswrap2 .layui-row .layui-col-sm3 .operabox").css({"margin-top":"600px"});				
		}else{
			$(".userswrap2 .layui-row .layui-col-sm3 .operabox").css({"margin-top":"0px"});
		}								
	});						
});  */


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
add_action('admin_menu', 'bo_users_menu');
?>