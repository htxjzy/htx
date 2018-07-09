<?php
if(isset($_GET["action"])){

	switch($_GET["action"]){
		case 10 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(10) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 11 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(11) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 12 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(12) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 13 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(13) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 14 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(14) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 15 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(15) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 16 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(16) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 17 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(17) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 18 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(18) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;
		case 19 :
			$args=array('post_type' => array('subcats'), 'tax_query'=> array(array('taxonomy'=>'assignmentstax', 'terms'=>array(19) ) ), 'orderby'=>'post_date','order'=>'ASC');
			break;	
	}
	
	$recentPosts=new WP_Query($args);
	while ($recentPosts->have_posts()) : $recentPosts->the_post();	//loop2 start
?>
	<option value="<?php the_ID(); ?>"><?php echo excerpttitle(20); ?></option>
<?php 
	endwhile;	//loop2 end  
}//end if
?> 