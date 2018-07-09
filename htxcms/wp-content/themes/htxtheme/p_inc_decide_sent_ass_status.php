<?php 
if(is_user_logged_in()){	
	$cur_user = $current_user->ID;
	
	$args_num_all=array(
		'author'		=> $cur_user,
		'post_type' 	=> array('assignments'), 
		'post_status'	=>array('publish','draft'), 	
	);
	$posts_num_all=new WP_Query($args_num_all);
	$total_num_all = $posts_num_all->found_posts;

	$terms = array('auditing', 'tendering', 'bidopening', 'making', 'finished', 'completed' );	
	foreach($terms as $term){
		$tax_query = array(
			array(
				'taxonomy'=>'assignmentsstatus',
				'field'    =>'slug',
				'terms'    =>$term,
			)
		); 	
		$args_num=array(
			'author'		=> $cur_user,
			'post_type' 	=> array('assignments'), 
			'post_status'	=>array('publish','draft'), 
			'tax_query'		=>$tax_query,
	
		);
		$recentPosts_num=new WP_Query($args_num);
		$total_num[$term] = $recentPosts_num->found_posts;
	}
	
				
	$cur_url = home_url().'/other/my_sent_assignments';			
	$paged = isset( $_GET[ 'cpage' ] ) ? $_GET[ 'cpage' ] : 1;	
	$number = 20;
	$offset = ( $paged - 1 ) * $number;	
			
	if(!empty($_GET['status'])){
		$get_value = trim($_GET['status']);	
		switch($get_value){
			case 'all':
				$args=array(
					'author'		=> $cur_user,
					'post_type' 	=> array('assignments'),
					'post_status'	=>array('publish','draft'), 
					'posts_per_page'=>$number,
					'offset' 		=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=all&cpage=%#%';
				$alink = $cur_url.'?status=all';				
				break;			
			case 'auditing':
				$args=array(
					'author'		=> $cur_user,
					'post_type' 	=> array('assignments'),
					'post_status'	=>array('draft'), 
					'posts_per_page'=>$number,
					'offset' 		=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=auditing&cpage=%#%';
				$alink = $cur_url.'?status=auditing';				
				break;	
			case 'tendering':
				$tax_query = array(
				   array(
					   'taxonomy'=>'assignmentsstatus',
					   'field'    =>'slug',
					   'terms'    =>'tendering',
				   )
   				);
				$args=array(
					'author'		=> $cur_user,
					'post_type' 	=> array('assignments'),
					'post_status'	=>array('publish'), 
					'tax_query'		=>$tax_query,
					'posts_per_page'=>$number,
					'offset' 		=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=tendering&cpage=%#%';
				$alink = $cur_url.'?status=tendering';				
				break;		
			case 'bidopening':
				$tax_query = array(
				   array(
					   'taxonomy'=>'assignmentsstatus',
					   'field'    =>'slug',
					   'terms'    =>'bidopening',
				   )
   				);
				$args=array(
					'author'			=> $cur_user,
					'post_type' 		=> array('assignments'),
					'post_status'		=> array('publish'), 
					'tax_query'			=> $tax_query,
					'posts_per_page'	=> $number,
					'offset' 			=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=bidopening&cpage=%#%';
				$alink = $cur_url.'?status=bidopening';				
				break;		
			case 'making':
				$tax_query = array(
				   array(
					   'taxonomy'=>'assignmentsstatus',
					   'field'    =>'slug',
					   'terms'    =>'making',
				   )
   				);
				$args=array(
					'author'			=> $cur_user,
					'post_type' 		=> array('assignments'),
					'post_status'		=> array('publish'), 
					'tax_query'			=> $tax_query,
					'posts_per_page'	=> $number,
					'offset' 			=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=making&cpage=%#%';
				$alink = $cur_url.'?status=making';				
				break;		
			case 'finished':
				$tax_query = array(
				   array(
					   'taxonomy'=>'assignmentsstatus',
					   'field'    =>'slug',
					   'terms'    =>'finished',
				   )
   				);
				$args=array(
					'author'			=> $cur_user,
					'post_type' 		=> array('assignments'),
					'post_status'		=> array('publish'), 
					'tax_query'			=> $tax_query,
					'posts_per_page'	=> $number,
					'offset' 			=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=finished&cpage=%#%';
				$alink = $cur_url.'?status=finished';				
				break;		
			case 'completed':
				$tax_query = array(
				   array(
					   'taxonomy'=>'assignmentsstatus',
					   'field'    =>'slug',
					   'terms'    =>'completed',
				   )
   				);
				$args=array(
					'author'			=> $cur_user,
					'post_type' 		=> array('assignments'),
					'post_status'		=> array('publish'), 
					'tax_query'			=> $tax_query,
					'posts_per_page'	=> $number,
					'offset' 			=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=completed&cpage=%#%';
				$alink = $cur_url.'?status=completed';				
				break;		

		}			
	}else{  //else status
				$args=array(
					'author'		=> $cur_user,
					'post_type' 	=> array('assignments'),
					'post_status'	=>array('publish','draft'), 
					'posts_per_page'=>$number,
					'offset' 		=> $offset
				);
				$recentPosts=new WP_Query($args);
				$total = $recentPosts->found_posts;
				$format = $cur_url.'?status=all&cpage=%#%';
				$alink = $cur_url.'?status=all';			
	}
}	//end if is_user_logged_in