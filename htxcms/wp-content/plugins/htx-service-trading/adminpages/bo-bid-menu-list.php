<?php 
	date_default_timezone_set('prc'); 
	$type = array('bid');
	$args = array(
		'type'			=> $type,
		'date_query' 	=> NULL,			
		'count' 		=> true //return only the count
	);	
	$total = get_comments($args);	
?>
<div class="bidwrap">
<div class="divp">
	<span><b>投标帖子列表</b></span><span>总共 <i><?php echo $total; ?></i> 条投标记录</span><a class="aall" href="/htxcms/wp-admin/admin.php?page=bo_bid_menu_slug">查阅全部</a>
    <form class="search-date" method="post" action="/htxcms/wp-admin/admin.php?page=bo_bid_menu_slug">
        <div class="layui-form-item">
            <label class="layui-form-label">日期</label>
            <div class="layui-input-inline">
            	<input type="text" name="inputdate" required lay-verify="required" id="inputdate" placeholder="请输入日期" autocomplete="off" class="layui-input">
            </div>    	
            <input name="sdate_submit" type="submit" value="查 询" title="查询" class="layui-form-mid layui-word-aux" />  	
        </div>
    </form>   
    <form class="search-keyword layui-form" method="post" action="/htxcms/wp-admin/admin.php?page=bo_bid_menu_slug">       
      <div class="layui-form-item">
        <label class="layui-form-label">关键词</label>
        <div class="layui-input-inline" style="width:100px;">
          <select name="sfield" lay-verify="required">
            <option value="0">全部</option>
            <option value="1">ID</option>
            <option value="2">投标者</option>
            <option value="3">手机</option>
            <option value="4">邮箱</option>
            <option value="5">标的ID</option>
            <option value="6">标的名</option>
            <option value="7">终编者</option>
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
	$cur_url = home_url().'/htxcms/wp-admin/admin.php?page=bo_bid_menu_slug';
	
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
				$_POST['knum']="ID";
				$args = array(
					'comment__in' 	=> array($keyword), 
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'comment__in' 	=> array($keyword), 
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);				
				break;
			case 2:
				$_POST['knum']="投标者";
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
			case 3:
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
			case 4:
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
			case 5:
				$_POST['knum']="标的ID";
				$args = array(
					'post_id' 		=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'post_id' 		=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);			
				break;
			case 6:
				$_POST['knum']="标的名";
				$postidquery = "SELECT ID FROM htx_posts WHERE post_title like '%{$keyword}%'";
				$postidArrs = $wpdb->get_results($postidquery); 
				foreach($postidArrs as $postidArr){
					$postids[] = $postidArr->ID;
				}
				$args = array(
					'post__in' 		=> $postids,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'post__in' 		=> $postids,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);									
				break;
			case 7:
				$_POST['knum']="终编者";
				$args = array(
					'meta_key' 		=> '_final_editor',
					'meta_value'	=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'number' 		=> $number,
					'offset' 		=> $offset						
				);
				$args_num = array(
					'meta_key' 		=> '_final_editor',
					'meta_value'	=> $keyword,
					'type'			=> $type,
					'date_query' 	=> NULL,
					'count' 		=> true 		
				);
				$total = get_comments($args_num);									
				break;
		}	
		echo '<p>选择 【'.$_POST["knum"].'】 输入 <span>'.$_POST["keyword"].'</span> 对应的搜索结果有 <span>'.$total.'</span> 条， 记录如下：</p>';	
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
		echo '<p>查询到 <span>'.$sdate.'</span> 日的投标帖子有 <span>'.$total.'</span> 条， 记录如下：</p>';		
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
<table class="bidtable">
<tr><th>ID</th><th>投标者</th><th>手机</th><th>邮箱</th><th>标的ID</th><th>标的名</th><th>标的类</th><th>终编者</th><th>投标时间</th><th>状态</th><th>操作</th></tr>
<?php
	$comments_query = new WP_Comment_Query;
	$comments = $comments_query->query( $args );	
	if ( $comments ) {		 
		foreach ( $comments as $comment ) {		 
			// Do what you do for each comment here. 
			$comment_id = $comment->comment_ID;	
			$user_id = $comment->user_id;
			$user = get_user_by( 'id', $user_id );
			$bidder = $user->user_login;
			$mobile = get_user_meta($user_id, 'custom_user_mobile', true);
			$email = $user->user_email;			
			$bid_for_id = $comment->comment_post_ID;
			$bid_for_name = get_post($bid_for_id)->post_title;
			$termsArr = wp_get_object_terms($bid_for_id, 'assignmentstax', array('fields'=>'names') );
			$termname = $termsArr[0];
			$final_editor = get_comment_meta( $comment_id, '_final_editor', true );
			$comment_date = $comment->comment_date;	
			$comment_approved = $comment->comment_approved;
			$status = $comment_approved ? '已通过':'<span>待审核</span>';
							
			echo '<tr><td>'.$comment_id.'</td><td>'.$bidder.'</td><td>'.$mobile.'</td><td>'.$email.'</td><td><span class="bc-gain-red">'.$bid_for_id.'</span></td><td><a title="查阅标的任务" target="_blank" href="'.home_url().'/assignment/'.$bid_for_id.'.html">'.$bid_for_name.'</a></td><td>'.$termname.'</td><td>'.$final_editor.'</td><td>'.$comment_date.'</td><td>'.$status.'</td><td><a class="readbid" href="'.$alink.'&bid_id='.$comment_id.'">查看</a><span>|</span><a class="deletebid" href="javascript:;" delete_bid_id="'.$comment_id.'">删除</a></td></tr>';
					 
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
			echo '<tr><td id="tdpage" colspan="11">'.paginate_links($args).'</td></tr>';
		}
				
		 
	} else {
		// Display message because there are no comments.
		echo '<tr><td colspan="11"><div class="layui-none-information"><i></i><span>暂时没有交易记录</span></div></td></tr>';		 
	}
	
?>
</table>
</div><!--.bidwrap end-->