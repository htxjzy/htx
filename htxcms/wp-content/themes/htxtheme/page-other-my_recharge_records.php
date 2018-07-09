<?php 
/*
Template Name: 充值记录
*/
session_start();
date_default_timezone_set('prc');  //Time shows Beijing time 
?>	
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/member.css">
<a class="banner_box" style="background:url(/p/images/banners/banner_user.jpg) center top no-repeat;" href="#"></a>
<!-- banner end -->

<article class="layui-main">
<?php include(TEMPLATEPATH . '/p_user_menu.php'); ?>
<div class="layui-center-box layui-clear">
        <div class="user-left">
<?php include(TEMPLATEPATH . '/p_user_finance_sidebar.php'); ?>
<script>
$(function(){
	$(".layui-main .layui-clear > a:nth-child(3)").addClass("cur");
	$(".layui-main .layui-clear .finance-nav ul li:nth-child(2) a").addClass("select");	
});
</script>
        </div>
        <!--左边 end-->
        <div class="user-right">
<div class="htx-box htx-box-money">
                <h3>
                    <b class="bc-red">充值记录</b>
                    <form class=" layui-form fr" id="form1"  method="post" action="<?php echo home_url().'/other/my_recharge_records'; ?>">               
                        <span class="layui-inline w200 mr0 fl spaninput">
                            <input type="text" name="inputdate" required="" id="inputdate1" lay-verify="required" placeholder="请选择日期" autocomplete="off" class="layui-input">
                        </span>
                        <span class="layui-inline mr0 fl">
                            <input name="submit1" type="submit" value="查 询"  class="layui-btn layui-btn-danger" style="position:relative; top:-10px;" />
                        </span>
                    </form>
                </h3>
                <div class="list_box">
                    <div class="list_li">
                        <strong>时间范围：</strong>
                        <a class="cur" href="/other/my_recharge_records">全部</a>
                        <a href="/other/my_recharge_records?paradate=week">近一周</a>
                        <a href="/other/my_recharge_records?paradate=month">近一个月</a>
                        <a href="/other/my_recharge_records?paradate=3months">近三个月</a>
                        <a href="/other/my_recharge_records?paradate=6months">近半年</a>
                    </div>
                </div>
                <div class="htx-table">
                    <div class="query-title">
                        <span class="fl">查询到 <b class="bc-red">
<?php
if(is_user_logged_in()){
	$cur_user = $current_user->ID;	
	$cur_url = home_url().'/other/my_recharge_records';
	if(isset($_GET['paradate']) && $_GET['paradate']=='week' ){
		unset($_SESSION['search_day']);		
		/*$date_query_args = array(
			 //'column' => 'comment_date',
			 'before' => date('Y-m-d',time()+3600*24),
			 'after' =>date('Y-m-d',time()-3600*24*7)		
		);		
		$date_query = new WP_Date_Query( $date_query_args, 'comment_date' );*/		
		$date_query = array(
			 'column' => 'comment_date',
			 'before' => date('Y-m-d',time()+3600*24),
			 'after' =>date('Y-m-d',time()-3600*24*7)		
		);
		$format = $cur_url.'?paradate=week&cmpage=%#%';
		$alink = $cur_url.'?paradate=week';
	}elseif(isset($_GET['paradate']) && $_GET['paradate']=='month'){
		unset($_SESSION['search_day']);	
		$date_query = array(
			 'column' => 'comment_date',
			 'before' => date('Y-m-d',time()+3600*24),
			 'after' =>date('Y-m-d',time()-3600*24*30)		
		);
		$format = $cur_url.'?paradate=month&cmpage=%#%';
		$alink = $cur_url.'?paradate=month';
	}elseif(isset($_GET['paradate']) && $_GET['paradate']=='3months'){
		unset($_SESSION['search_day']);	
		$date_query = array(
			 'column' => 'comment_date',
			 'before' => date('Y-m-d',time()+3600*24),
			 'after' =>date('Y-m-d',time()-3600*24*90)		
		);
		$format = $cur_url.'?paradate=3months&cmpage=%#%';
		$alink = $cur_url.'?paradate=3months';
	}elseif(isset($_GET['paradate']) && $_GET['paradate']=='6months'){
		unset($_SESSION['search_day']);	
		$date_query = array(
			 'column' => 'comment_date',
			 'before' => date('Y-m-d',time()+3600*24),
			 'after' =>date('Y-m-d',time()-3600*24*180)		
		);
		$format = $cur_url.'?paradate=6months&cmpage=%#%';
		$alink = $cur_url.'?paradate=6months';
	}elseif(isset($_POST['inputdate'])){
		$_SESSION['search_day'] = $_POST['inputdate'];	
		$ymdArr = explode('-', $_POST['inputdate']); 	
		$date_query = array(
			'column' => 'comment_date',
			array(
				'year'  =>$ymdArr[0],
				'month'	=>$ymdArr[1],
				'day'   =>$ymdArr[2]
			)
		);
		$format = $cur_url.'?paradate=inputdate&cmpage=%#%';
		$alink = $cur_url.'?paradate=inputdate';
	}elseif(isset($_GET['paradate']) && $_GET['paradate']=='inputdate'){
		$ymdArr = explode('-', $_SESSION['search_day']); 	
		$date_query = array(
			'column' => 'comment_date',
			array(
				'year'  =>$ymdArr[0],
				'month'	=>$ymdArr[1],
				'day'   =>$ymdArr[2]
			)
		);
		$format = $cur_url.'?paradate=inputdate&cmpage=%#%';
		$alink = $cur_url.'?paradate=inputdate';				
	}else{
		unset($_SESSION['search_day']);	
		$date_query = NULL;
		$format = $cur_url.'?cmpage=%#%';
	}

	$args = array(
		'user_id' 		=> $cur_user,
		'type'			=> 'recharge',
		'date_query' 	=> $date_query,			
		'count' 		=> true //return only the count
	);
	
	$total = get_comments($args);
	echo $total;
}
?>                        
                        </b> 条充值记录</span>
                        <span class="fr">币种：人民币　　单位：元</span>
                    </div>
                    <table  class="layui-table"  lay-skin="nob">
                        <colgroup>
                            <col width="165">
                            <col width="245">
                            <col width="100">
                            <col width="126">
                            <col width="100">
                            <col>
                        </colgroup>
                        <thead>
                        <tr class="tr-th-bold">
                            <th>交易号</th>
                            <th>时间</th>
                            <th>名目</th>
                            <th>支付方式</th>
                            <th>金额</th>
                        </tr>
                        </thead>
                        <tbody>
                        
<?php 
if(is_user_logged_in()){	
 	$cur_user = $current_user->ID;	
	// The current page number, note that the query parameters here can not be used in paged, and will conflict with the paging parameters of the article.  
	$paged = isset( $_GET[ 'cmpage' ] ) ? $_GET[ 'cmpage' ] : 1;
	//Number of reviews per page
	$number = 20;
	$offset = ( $paged - 1 ) * $number;	

	$args = array(
		// Arguments for your query.
		'type'		=> 'recharge',		
		'user_id'	=> $cur_user,
		'date_query' => $date_query,
		'number' => $number,
		'offset' => $offset		
	);		
			 
	$comments_query = new WP_Comment_Query;
	$comments = $comments_query->query( $args );		
	//$total  Total number of records
			 
	if ( $comments ) {		 
		foreach ( $comments as $comment ) {		 
			// Do what you do for each comment here. 
			$comment_id = $comment->comment_ID;
			
			$out_trade_no = get_comment_meta($comment_id, 'out_trade_no', true);
			$time = $comment->comment_date;
			$subject = $comment->comment_content;
			$pay_type = get_comment_meta($comment_id, 'pay_type', true);
			$sum_money = get_comment_meta($comment_id, 'sum_money', true);
			
			echo '<tr><td>'.$out_trade_no.'</td><td>'.$time.'</td><td>'.$subject.'</td><td>'.$pay_type.'</td><td><span class="bc-gain-red">+'.$sum_money.'</span></td></tr>';		 
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
			echo '<tr><td id="tdpage" colspan="5">'.paginate_links($args).'</td></tr>';
		}
		
		 
	} else {
		// Display message because there are no comments.
		echo '<tr><td colspan="5"><div class="layui-none-information"><i></i><span>暂时没有信息</span></div></td></tr>';		 
	}
}
?>
<?php if(isset($_GET['paradate']) || isset($_POST['inputdate'])){ ?>
	<script>
    var curUrl = window.location.search;
    var subValue = curUrl.indexOf("&");
    if(subValue!='-1'){
        $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $alink; ?>");
    }
    </script>
<?php } else{ ?>
	<script>
    var curUrl = window.location.search;
    if(curUrl.length != 0 ){
        $("#tdpage .page-numbers:nth-child(2)").attr("href", "<?php echo $cur_url; ?>");
    }
    </script>
<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
    </div>
</article>
<script>
//layui.use(['jquery', 'element', 'laydate', 'upload', 'form', 'layer'], function(){
layui.use(['jquery', 'element', 'laydate', 'form'], function(){
	var $ = layui.$; 
  	var element = layui.element,
	laydate = layui.laydate,
    form = layui.form;
	
	//执行一个laydate实例
  	laydate.render({
    	elem: '#inputdate1' //指定元素
		,max: '<?php echo date('Y-m-d'); ?>'
  	});

});
</script>
<?php get_footer(); ?>
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
<?php } ?>	

