<?php 
	// Get the current page
	$current_page  = max( 1, $paged );
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
	if(!empty(paginate_links($args))){
		echo '<div id="pagenavi"><div class="htxpage">';
		echo paginate_links($args);
		echo '</div></div><!--#pagenavi end-->';
	}	// $args 			
?>
	<script>
    var curUrl = window.location.search;
    if(curUrl.length != 0 ){
        $("#pagenavi .htxpage .page-numbers:nth-child(2)").attr("href", "<?php echo $cur_url; ?>");
		if(curUrl=="?cpage=2"){ $("#pagenavi .htxpage .page-numbers:nth-child(1)").attr("href", "<?php echo $cur_url; ?>"); }
    }
    </script>   