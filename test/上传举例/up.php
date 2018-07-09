<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图片上传</title>
	<link rel="stylesheet" href="/layui/css/layui.css">
	<script src="/layui/layui.js"></script>
</head>
<body>
	<button type="button" class="layui-btn" id="test1">
	  <i class="layui-icon">&#xe67c;</i>上传图片
	</button>
	<input type="hidden" name="" id="files" >
</body>
</html>
<script>
	layui.use(['upload','jquery'], function(){
	  var upload = layui.upload,$=layui.jquery;
	  //执行实例
	  var uploadInst = upload.render({
	    elem: '#test1' //绑定元素
	    ,url: '{:url("/upfile")}' 
	    //上传服务器接口，这个地址用来接收上传的文件并进行处理
	    ,done: function(res){
	      if(res.msg=="1"){
	      	 $("#files").val(res.filesavename);
	      }
	    }
	    ,error: function(){
	      //请求异常回调
	    }
	  });
	});
</script>