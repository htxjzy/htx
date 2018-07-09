// JavaScript Document
layui.use(['jquery', 'element', 'laydate', 'upload', 'form', 'layer'], function(){
	var $ = layui.$; 
  	var element = layui.element,
	laydate = layui.laydate,
	upload = layui.upload,	
    form = layui.form,
	layer = layui.layer;
    	
//Executing an uploaded images instance
var uploadInst = upload.render({
	elem: '#img-upload' //Binding element
    ,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
	,size: 200 //Limit the size of the picture, unit KB
	,before: function(obj){
      //According to the local picture, does not support IE8
      obj.preview(function(index, file, result){
        $('#locaimg').attr('src', result); //Picture linking（base64）
      });
    }
    ,done: function(res){
      //Upload finished callback
      //If the upload failed
      if(res.status > 0){
        return layer.msg('上传失败');
      }
      //Upload success	  
	  //layer.msg(JSON.stringify(res));
	  var imgUrl="/submission_upload/upfiles/"+res.message;
	  $("input[name='avatar_upimg']").attr('value', imgUrl); 
	  	  
    }
    ,error: function(){
      //Request an exception callback
    }
	
});



	//Custom validation rules
	form.verify({
		numWords: function(value){
		  if(value.length > 300){
			return '标语不能超过300字符';
		  }
		},
		nickName: function(value){
			if(value.length > 50){
				return '昵称超出规定的字符';
			}		
		}
		,zhName: function(value){
			if(!(value.match(/^[\u4E00-\u9FA5]+$/) && value.length>=2 && value.length<=4)){
				return '姓名的长度应是2到4个汉字！';
			}
			return false;				
		}
		,positiveInteger: function(value){
			if(!value.match(/^\+?[1-9][0-9]*$/)){
				return '请输入正整数';
			}
			return false;				
		}
		,isUpload: function(value){
			if(value==""){
				return '请上传图片';
			}
			return false;				
		}
	});
	  	
	
	//Asynchronous Ajax submission form
	var submitUrl = "/other/dataproccess";
	
	form.on('submit(accountSetFormSubmit)', function(data){
    	//layer.msg(JSON.stringify(data.field));
   		
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				layer.open({
					title: false,
					content:rdata.reg,
					yes: function(index, layero){
						//do something
						window.location.reload();
						//window.location.href="/other/fee"; 
						layer.close(index); 
					},
					cancel: function(index, layero){
						//do something 
						window.location.reload();
						//window.location.href="/other/fee"; 
						layer.close(index);
					}    
				}); 															
			}
		});
		//layer.msg(JSON.stringify(data.field));		
		return false;		
		
	});//formSubmit end	  
  
  
});

function userDefaultAvatar(){
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();	
	var postUrl = "/other/dataproccess";			
	var postData = {
		htx_nonce_field_name: htx_nonce_field_name,
	};
	$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			//dataType: 'json',
			data: postData,
			success: function (data) {							
				$("input[name='avatar_upimg']").attr('value', '/p/images/member/tx300grayccc.jpg'); 
				$("#locaimg").attr('src', '/p/images/member/tx300grayccc.jpg'); 			   				
			}
	});		
		
}

	




















