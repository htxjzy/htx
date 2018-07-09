<?php session_start(); ?>
<?php
/*
Template Name: 用户退出机制
*/
unset($_SESSION['user_session']);
wp_clear_auth_cookie();	
header('location:'.$_SERVER['HTTP_REFERER']);