<div class="exp_candidates">
<?php
$exp_selected = (array)get_post_meta( $post->ID, '_htx_ass_exp_selected', true );
$argsArr=array('post_type' => array('experts'), 'post__in'=>$exp_selected);
$querycan = new WP_Query($argsArr);
while ($querycan->have_posts()) : $querycan->the_post();
?>
<div class="exp_can_box">
<div class="canwrap layui-row">
	<div class="layui-col-md2">
    	<a href="javascript:;">
        <img class="smallimg" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" />
        <img class="bigimg" src="<?php echo get_post_meta($post->ID, '_htx_exp_upphoto', true); ?>" />
        </a>
    </div>
	<div class="layui-col-md10">
		<div class="rbox">
        	<span>ID： <?php echo $post->ID; ?></span> <span>工作年限： <?php echo get_post_meta($post->ID, '_htx_exp_project_timelimit', true); ?>年</span> <span>星级：<i class="layui-icon">&#xe658;</i><i class="layui-icon">&#xe658;</i><i class="layui-icon">&#xe658;</i><i class="layui-icon" style="font-size:14px">&#xe600;</i><i class="layui-icon" style="font-size:14px">&#xe600;</i></span> 
        </div>
        <div class="rbox">
        	<span>擅长领域： 
<?php 
	$terms = wp_get_object_terms($post->ID, 'assignmentstax', array('fields'=>'all') );
	$str_name = "";
	foreach($terms as $term){
		$str_name .= $term->name."， ";
	}
	$str_name = rtrim($str_name, '， ');
	echo $str_name;
?>
            </span>
        </div>
        <div class="rbox">
        	所在地区： <span>广西壮族自治区-南宁-青秀区</span>
        </div>  
        <div class="hidden-display-box">
<fieldset class="layui-elem-field">
  <legend>项目经验</legend>
  <div class="layui-field-box">
<?php echo get_post_meta($post->ID, '_htx_exp_work_project', true); ?>
  </div>
</fieldset>         	

<fieldset class="layui-elem-field">
  <legend>专家介绍</legend>
  <div class="layui-field-box">
<?php echo $post->post_content; ?>
  </div>
</fieldset>         	           
        </div>  
    </div><!--.layui-col-md10 end-->
<img class="baguantubiao" src="/p/images/baguan90.png" />
<a id="candidateyes" class="downbutton" href="javascript:;" title="展开" style="top:32px; right:20px"></a>
</div>
<div class="blk20"></div>
</div><!--.exp_can_box end-->
<?php
endwhile; 
// Restore original Post Data
wp_reset_postdata(); //the loop end 
?>
</div><!--.exp_candidates end-->