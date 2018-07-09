<?php
/*sleep(1);   //休眠1秒钟
$return = array();
if (isset($_GET['act'])) {
    $action = $_GET['act']; // 获取GET参数
    if ($action == 'images') {
        //上传图片具体操作
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES["file"]["type"];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_error = $_FILES["file"]["error"];
        $file_size = $_FILES["file"]["size"];
        
        if ($file_error > 0) { // 出错
            $return['status'] = 1;
            $return['message'] = $file_error;
            $return['time'] = 3000;
            exit(json_encode($return));
        }
        if ($file_size > 1048576) { // 文件太大了
            $return['status'] = 1;
            $return['message'] = "上传文件不能大于1MB";
            $return['time'] = 3000;
            exit(json_encode($return));
        }
        $file_name_arr = explode('.', $file_name);
        $new_file_name = date('YmdHis') . '.' . $file_name_arr[1];
        $file_path = "upfiles/" . $new_file_name;
        if (file_exists($file_path)) {
            $return['status'] = 1;
            $return['message'] = "此文件已经存在啦";
            $return['time'] = 3000;
            exit(json_encode($return));
        } else {
            $upload_result = move_uploaded_file($file_tmp, $file_path); // 此函数只支持 HTTP POST 上传的文件
            if ($upload_result) {
                $return['status'] = 0;
                $return['message'] = $file_path;
                $return['time'] = 1000;
                exit(json_encode($return));
            } else {
                $return['status'] = 1;
                $return['message'] = "文件上传失败，请稍后再尝试";
                $return['time'] = 3000;
                exit(json_encode($return));
            }
        }
    }
} else {
    $return['status'] = 1;
    $return['message'] = "参数错误";
    $return['time'] = 3000;
    exit(json_encode($return));
	
}
*/

//the 2rst method
//proccessing file upload start

if(!is_uploaded_file($_FILES["file"]["tmp_name"])){
	exit;
}

//包含一个文件上传类中的上传类
include "fileupload.class.php"; 

$return = array();
 
$upfile = new fileupload;
//设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
$upfile -> set("path", dirname(__FILE__)."/upfiles/");
$upfile -> set("maxsize", 1000000);
$upfile -> set("allowtype", array("png", "jpg", "jpeg", "gif"));
$upfile -> set("israndname", true);
  
//使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名字, 如果成功返回true, 失败返回false
if($upfile -> upload("file")) {

	$return['status'] = 0;
	$return['message'] = $upfile->getFileName();
	$return['time'] = 1000;
	exit(json_encode($return));	
  
} else {

    $return['status'] = 1;
    $return['message'] = "上传失败";
    $return['time'] = 3000;
    exit(json_encode($return));

}
