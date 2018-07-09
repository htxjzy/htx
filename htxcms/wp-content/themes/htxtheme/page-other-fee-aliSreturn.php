<?php 
/*
Template Name: 支付宝同步返回
*/
header ( "Content-type:text/html;charset=utf-8" );
date_default_timezone_set('prc');  //Time shows Beijing time

echo '<p style="text-align:center; margin-top:150px; color:green">支付成功</p>';

sleep(2);

$toUrl=home_url();
header ("location:{$toUrl}/other/user_finance");	