<?php
session_start();
//Specify the data that only receives the brotherhood server
$ipArr = array('120.77.238.100', '120.76.72.25','120.76.72.28');
$ip = brother_getIP();
if(!in_array($ip, $ipArr)){
	echo json_encode(array('error' => 1, 'txt'=>'非法登录'));
	exit;	
}
?>
<?php
/*
Template Name: 用户数据交互
*/
//file_get_contents("php://input");
//$outputdata = file_get_contents("php://input");
//{"phone":"18376600223","email":"","password":"578753300","flag":"reg01"}
//{"phone":"18376600223","email":"","password":"578753300","flag":"log02"}
//{"phone":"18677197764","email":"","password":"tan12272396","flag":"pwd03"}
//{"phone":"18376600223","email":"","password":"578753300","flag":"out04"}
/*{"act":"ReturnData_url","flag":"1","username":"P-J\u5927\u4f6c","sex":"\u7537","province":"\u5e7f\u897f","city":"\u5357\u5b81","birthday":"2012","pic":"http:\/\/qzapp.qlogo.cn\/qzapp\/101440785\/53BDD3C55D61D7F0A423C8F362C70226\/100","openid":"53BDD3C55D61D7F0A423C8F362C70226","flag1":"coo04","qq":"ID:167944"}*/

$postArr = $_POST;
//$outputdata = json_encode($postArr);
//file_put_contents($_SERVER['DOCUMENT_ROOT']."/ueditor/php/upload/outputdata.txt", $outputdata);
//echo $_SERVER['DOCUMENT_ROOT']."/ueditor/php/upload/outputdata.txt";

if( isset($postArr['flag']) && $postArr['flag']=='reg01' ){
	//include(TEMPLATEPATH . '/brother-reglog-insert-db.php');	//分享用户数据暂时屏蔽，开发完之后会打开	
}

if( isset($postArr['flag']) && $postArr['flag']=='log02' ){
//$outputdata = json_encode($postArr);
//file_put_contents($_SERVER['DOCUMENT_ROOT']."/ueditor/php/upload/outputdata.txt", $outputdata);
//echo $_SERVER['DOCUMENT_ROOT']."/ueditor/php/upload/outputdata.txt";	
	//include(TEMPLATEPATH . '/brother-reglog-insert-db.php');//分享用户数据暂时屏蔽，开发完之后会打开		
}

if( isset($postArr['flag']) && $postArr['flag']=='pwd03' ){
	//include(TEMPLATEPATH . '/brother-reset-pwd.php');//分享用户数据暂时屏蔽，开发完之后会打开				
}

if( isset($postArr['flag1']) && $postArr['flag1']=='coo04' ){
	//include(TEMPLATEPATH . '/brother-third-visit.php');	//分享用户数据暂时屏蔽，开发完之后会打开			
}

/*if( isset($postArr['flag']) && $postArr['flag']=='out04' ){
	include(TEMPLATEPATH . '/brother-sign-out.php');			
}*/


