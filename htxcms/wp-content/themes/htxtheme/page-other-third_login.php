<?php
/*
Template Name: 第三方登录
*/
?>
<?php
$htxnonce = $_REQUEST['_htxnonce'];
if (!wp_verify_nonce($htxnonce, 'htxthird') ) {
	wp_die("非法操作");
}
$reUrl=home_url()."/other/third_return?checkiswomen=htx_zijiye8928053";
header ("location:http://www.gxhtx.com/qq/index.php?api={$reUrl}");
