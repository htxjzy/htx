<?php
namespace app\controller;
use think\Controller;
class Upfile extends Controller
{
    public function index()
    {
		 $files = $this->request->file('file');
		 $data["msg"]=0;
		 if($files){
		        $info = $files->move(ROOT_PATH . 'public' . DS . 'uploads');
		        if($info){
		            $data["msg"] = 1;
		            $data["filesavename"] = $info->getSaveName();
		             
		        }else{
		            // 上传失败获取错误信息
		            $data["msg"] = $file->getError();
		        }
		    }
		  return json($data);  //返回json格式的数据

    }
    public function up(){
    	return $this->fetch();
    }
   
}
