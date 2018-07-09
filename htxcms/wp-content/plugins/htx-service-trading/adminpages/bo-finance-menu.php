<?php
function bo_finance_menu(){  
    add_menu_page( '财务事务', '财务', 'publish_pages', 'bo_finance_menu_slug', 'display_bo_finance_menu', 'dashicons-list-view', 43 ); 	
}     
function display_bo_finance_menu(){ 
	global $wpdb;
?>
<link rel="stylesheet" href="/layui/css/layui.css">
<link rel="stylesheet" href="/p/css/admin/bo-finance-menu.css?ver=1.1" />
<script src='/p/js/jquery.min.js'></script>
<script src="/layui/layui.js"></script>
<?php
	$type = array('recharge', 'consume', 'earning');
	$args = array(
		'type'			=> $type,
		'date_query' 	=> NULL,			
		'count' 		=> true //return only the count
	);	
	$total = get_comments($args);
	
	$income_query = "SELECT comment_ID FROM htx_comments WHERE comment_type IN ('recharge', 'earning')";	
	$income_result = $wpdb->get_results($income_query); 
	foreach( $income_result as $income ){
		$comment_id = $income->comment_ID;
		$income_money = get_comment_meta($comment_id, 'sum_money', true);
		$sum_income += (float)$income_money; 	
	}		
	$payout_query = "SELECT comment_ID FROM htx_comments WHERE comment_type='consume'";
	$payout_result = $wpdb->get_results($payout_query); 
	foreach( $payout_result as $payout ){
		$comment_id = $payout->comment_ID;
		$payout_money = get_comment_meta($comment_id, 'sum_money', true);
		$sum_payout += (float)$payout_money; 	
	}	
	$balance = $sum_income - $sum_payout;
	
?>
<div class="fwrap">
<div class="divp">
<span><b>余额</b>：￥<i><?php echo $balance; ?></i> </span><span><b>累计收入</b>：￥<i><?php echo $sum_income; ?></i> </span><span><b>累计支出</b>：￥<i><?php echo $sum_payout; ?></i> </span><span>共 <i><?php echo $total; ?></i> 条记录</span><a class="aall" href="/htxcms/wp-admin/admin.php?page=bo_finance_menu_slug">查阅全部</a>
    <form class="search-date" method="post" action="/htxcms/wp-admin/admin.php?page=bo_finance_menu_slug">
        <div class="layui-form-item">
            <label class="layui-form-label">日期</label>
            <div class="layui-input-inline">
            	<input type="text" name="inputdate" required lay-verify="required" id="inputdate" placeholder="请输入日期" autocomplete="off" class="layui-input">
            </div>    	
            <input name="sdate_submit" type="submit" value="查 询" title="查询" class="layui-form-mid layui-word-aux" />  	
        </div>
    </form>
    <form class="search-keyword layui-form" method="post" action="/htxcms/wp-admin/admin.php?page=bo_finance_menu_slug">       
      <div class="layui-form-item">
        <label class="layui-form-label">关键词</label>
        <div class="layui-input-inline" style="width:100px;">
          <select name="sfield" lay-verify="required">
            <option value="0">全部</option>
            <option value="1">交易号</option>
            <option value="2">收支摘要</option>
            <option value="3">支付方式</option>
            <option value="4">用户名</option>
            <option value="5">手机</option>
            <option value="6">邮箱</option>
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
	$cur_url = home_url().'/htxcms/wp-admin/admin.php?page=bo_finance_menu_slug';
	
	$paged = isset( $_GET[ 'cmpage' ] ) ? $_GET[ 'cmpage' ] : 1;
	$number = 30;
	$offset = ( $paged - 1 ) * $number;	
		
	if(isset($_POST['skeyword_submit'])  || $_GET['input']=='inputkeyword' ){	
		$keyword = trim($_POST['keyword']);	
		switch($_POST['sfield']){
			case 0:
				$_POST['knum']="全部";
				$args = array(
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);				
				break;			
			case 1:
				$_POST['knum']="交易号";
				$args = array(
					'meta_key' 		=> 'out_trade_no',
					'meta_value' 	=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'meta_key' 		=> 'out_trade_no',
					'meta_value' 	=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);				
				break;
			case 2:
				$_POST['knum']="收支摘要";
				$commentid_query = "SELECT comment_ID FROM htx_comments WHERE comment_content like '%{$keyword}%'";
				$commentidArrs = $wpdb->get_results($commentid_query); 
				foreach($commentidArrs as $commentidArr){
					$commentids[] = $commentidArr->comment_ID;
				}
				$args = array(
					'comment__in' 	=> $commentids,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'comment__in' 	=> $commentids,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);									
				break;
			case 3:
				$_POST['knum']="支付方式";
				$args = array(
					'meta_key' 		=> 'pay_type',
					'meta_value' 	=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'meta_key' 		=> 'pay_type',
					'meta_value' 	=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);									
				break;
			case 4:
				$_POST['knum']="用户名";
				$user_id = get_user_by('login', $keyword)->ID;
				$args = array(
					'user_id' 		=> $user_id,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'user_id' 		=> $user_id,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);									
				break;
			case 5:
				$_POST['knum']="手机";
				$mobilequery = "SELECT user_id FROM htx_usermeta WHERE meta_key='custom_user_mobile' AND meta_value='{$keyword}'";
				$mobile_result = $wpdb->get_row($mobilequery); 
				$user_id = $mobile_result->user_id;	
				$args = array(
					'user_id' 		=> $user_id,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'user_id' 		=> $user_id,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);						
				break;
			case 6:
				$_POST['knum']="邮箱";
				$user_id = get_user_by('email', $keyword)->ID;
				$args = array(
					'user_id' 		=> $user_id,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'user_id' 		=> $user_id,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);							
				break;
		}	
		echo '<div class="sresult">选择 【'.$_POST["knum"].'】 输入 <span>'.$_POST["keyword"].'</span> 对应的搜索结果有 <span>'.$total.'</span> 条， 记录如下：</div>';	
		$format = $cur_url.'&input=inputkeyword&cmpage=%#%';
		$alink = $cur_url.'&input=inputkeyword';	
	
	
	}elseif(isset($_POST['inputdate']) || $_GET['input']=='inputdate' ){
		
		if(!empty($_POST['inputdate'])){		
			update_option("search_one_day", $_POST['inputdate']);
		}
		$sdate = get_option("search_one_day");
		
		$ymdArr = explode('-', $sdate); 	
		$date_query = array(
			'column' => 'comment_date',
			array(
				'year'  =>$ymdArr[0],
				'month'	=>$ymdArr[1],
				'day'   =>$ymdArr[2]
			)
		);
		$args_num = array(
			'type'			=> $type,
			'date_query' 	=> $date_query,
			'count' 		=> true 		
		);
		$total = get_comments($args_num);			
		echo '<div class="sresult">查询到 <span>'.$sdate.'</span> 日的交易记录有 <span>'.$total.'</span> 条， 记录如下：</div>';		
		$args = array(
			'type'			=> $type,
			'date_query' 	=> $date_query,
			'number' => $number,
			'offset' => $offset						
		);
		$format = $cur_url.'&input=inputdate&cmpage=%#%';
		$alink = $cur_url.'&input=inputdate';		
	}else{
		$date_query = NULL;
		//echo '<p>全部投标帖子记录如下：</p>';		
		$args = array(
			'type'			=> $type,
			'date_query' 	=> $date_query,
			'number' => $number,
			'offset' => $offset						
		);					
		$format = $cur_url.'&cmpage=%#%';
		$alink = $cur_url;
	}
?>



<table class="ftable">
<tr><th>交易号</th><th>时间</th><th>收支摘要</th><th>支付方式</th><th>收支金额(￥)</th><th>用户名</th><th>手机</th><th>邮箱</th></tr>
<?php
	$comments_query = new WP_Comment_Query;
	$comments = $comments_query->query( $args );	
	if ( $comments ) {		 
		foreach ( $comments as $comment ) {		 
			// Do what you do for each comment here. 
			$comment_id = $comment->comment_ID;			
			$out_trade_no = get_comment_meta($comment_id, 'out_trade_no', true);
			$comment_date = $comment->comment_date;
			$subject = $comment->comment_content;
			$pay_type = get_comment_meta($comment_id, 'pay_type', true);
			$sum_money = get_comment_meta($comment_id, 'sum_money', true);
			$comment_type = $comment->comment_type;
			
			$user_id = $comment->user_id;
			$userObj = get_userdata($user_id);
			$loginname = $userObj->user_login;
			$mobile = get_user_meta($user_id, 'custom_user_mobile', true);
			$email = $userObj->user_email;

			if($comment_type == 'recharge' || $comment_type == 'earning'){					
			echo '<tr><td>'.$out_trade_no.'</td><td>'.$comment_date.'</td><td>'.$subject.'</td><td>'.$pay_type.'</td><td><span class="bc-gain-red">+'.$sum_money.'</span></td><td>'.$loginname.'</td><td>'.$mobile.'</td><td>'.$email.'</td></tr>';
			}
			if($comment_type == 'consume'){					
			echo '<tr><td>'.$out_trade_no.'</td><td>'.$comment_date.'</td><td>'.$subject.'</td><td>'.$pay_type.'</td><td><span class="bc-gain-red">-'.$sum_money.'</span></td><td>'.$loginname.'</td><td>'.$mobile.'</td><td>'.$email.'</td></tr>';
			}
			//$balance = 	number_format($balance, 2);						 
		}
				
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
			echo '<tr><td id="tdpage" colspan="8">'.paginate_links($args).'</td></tr>';
		}
				
		 
	} else {
		// Display message because there are no comments.
		echo '<tr><td colspan="8"><div class="layui-none-information"><i></i><span>暂时没有交易记录</span></div></td></tr>';		 
	}
	
?>
</table>
</div><!--.fwrap end-->
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
	

	layui.use(['jquery', 'element', 'laydate', 'form'], function(){
		var $ = layui.$; 
		var element = layui.element,	//下来框才有用
		laydate = layui.laydate,
		form = layui.form;	
		//执行一个laydate实例
		laydate.render({
			elem: '#inputdate' //指定元素
			,max: '<?php echo date('Y-m-d'); ?>'
		});
	
	});
</script>
<?php
}  
add_action('admin_menu', 'bo_finance_menu');
?>