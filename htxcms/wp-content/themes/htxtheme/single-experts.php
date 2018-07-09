<?php 
$termArr = wp_get_object_terms($post->ID, 'expertspublic', array('fields' => 'slugs')); 
$termname1 = $termArr[0]; 
$termname2 = $termArr[1]; 
if(empty($termname1)){	
	$toUrl=home_url()."/experts";
	header ("location:{$toUrl}");
}
?>
<?php get_header(); ?>
<link rel="stylesheet" href="/p/css/main.css?ver=2.0">
<a class="banner_box" style="background:url(/p/images/bannerlist.jpg) center top no-repeat;" href="#"></a>
<div class="wrap-for-s">
	<div class="dyn-nav dyn-nav-for-s">
		<blockquote class="layui-elem-quote">当前位置 <i class="layui-icon" style="font-size:22px; margin:0 10px; color:#FF5722;">&#xe715;</i> <a href="/" title="返回首页">首页</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <a href="/experts">部分专家展示</a><i class="layui-icon" style="font-size:16px; margin:0 10px; color:#666;">&#xe602;</i> <span>编号为 <?php the_ID(); ?> 的专家介绍</span> 
    </div>

    <div class="task">
        <div class="layui-main">

            <div class="single pb10">
                <div class="htx-list layui-clear">
                    <div class="list-table">  
<div class="exp_list">
<div class="exp_box">
<div class="boxwrap layui-row">
	<div class="layui-col-md2">
    	<a href="javascript:;">
<?php 
if(empty($termname2)){
	echo '<img class="smallimg" src="'.wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())).'" /><img class="bigimg" src="'.get_post_meta($post->ID, '_htx_exp_upphoto', true).'" />';
}else{
	echo '<img class="smallimg" src="/p/images/member/tx300grayccc.jpg" /><img class="bigimg" src="/p/images/member/tx300grayccc.jpg" />';	
}	
?>
        </a>
    </div>
	<div class="layui-col-md10">
		<div class="rbox">
        	<span>ID：  <?php echo $post->ID; ?></span> <span>性别：<?php echo get_post_meta( $post->ID, '_htx_exp_sex', true ); ?></span> <span>主职称：<?php echo get_post_meta( $post->ID, '_htx_exp_title', true ); ?></span> <span>工作年限： <?php echo get_post_meta($post->ID, '_htx_exp_project_timelimit', true); ?>年</span> <!--<span>星级：<i class="layui-icon"></i><i class="layui-icon"></i><i class="layui-icon"></i><i class="layui-icon" style="font-size:14px"></i><i class="layui-icon" style="font-size:14px"></i></span>--> 
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
        	所在地区： <span><?php echo get_post_meta( $post->ID, '_htx_exp_provid', true ); ?>-<?php echo get_post_meta( $post->ID, '_htx_exp_cityid', true ); ?>-<?php echo get_post_meta( $post->ID, '_htx_exp_areaid', true ); ?></span>
        </div>  
        <div class="the-display-box">
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
</div>
<div class="blk20"></div>
</div>
<fieldset class="layui-elem-field">
  <legend>入驻成为火天信专家</legend>
  <div class="layui-field-box">
<p><i class="layui-icon">&#xe617;</i> 入驻条件： 有项目工作经验的建筑行业专家</p>
<p><i class="layui-icon">&#xe617;</i> 入驻价值： 进驻后获得火天信品牌服务支撑，不受地域限制当全国建筑领域专家</p> 
<a href="/other/expert" class="shenqingzj">申请入驻</a>    
  </div>
</fieldset>
 
</div><!--.exp_list end-->         
                  
                    </div>
                    <div class="list-user-box" style="padding-top:0px">
<?php include(TEMPLATEPATH . '/sidebar_exp.php');  ?>
                        <a class="htx-adv-as mt20">
                        	<img src="/p/images/adh90.jpg" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--.wrap-for-s end-->
<?php get_footer(); ?>