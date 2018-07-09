<?php
/*
Template Name: 标准处理
*/
?>
<?php
if(isset($_GET["action"]) && $_GET["arg"]=='standard'){
	$thispost = get_post($_GET["action"]);	
	$standard_title = get_post_meta($_GET["action"], '_standard_title', true);	
	echo '<a target="_blank" href="'.$thispost->guid.'">'.$standard_title.'</a><input type="hidden" name="ass_subcat" value="'.$_GET["action"].'" />';
}