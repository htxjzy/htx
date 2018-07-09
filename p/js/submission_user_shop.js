// JavaScript Document
layui.use(['jquery', 'element', 'laydate', 'upload', 'form', 'layer'], function(){
	var $ = layui.$; 
  	var element = layui.element,
	laydate = layui.laydate,
	upload = layui.upload,	
    form = layui.form,
	layer = layui.layer;
	var $form = $('#htx_shop_form');	//prov-city-area use

//click tab event

$(".layui-tab ul.layui-tab-title li").click(function(){
	$("input[name='whosedata']").attr( "value" , $(this).attr("value")) ;		  
	if($("input[name='whosedata']").val()=="per"){
				
		//$("input[name^='p_']").removeAttr("lay-verify");
		$("input[name^='c_']").removeAttr("lay-verify");
		
		$("input[name='p_name']").attr("lay-verify", "required|zhName");
		$("input[name='p_front_photo']").attr("lay-verify", "isUpload");
		$("input[name='p_back_photo']").attr("lay-verify", "isUpload");	
							  
	}		
	if($("input[name='whosedata']").val()=="cor"){
		
		//$("input[name^='c_']").removeAttr("lay-verify");
		$("input[name^='p_']").removeAttr("lay-verify");
		
		$("input[name='c_enterprise_name']").attr("lay-verify", "required|longName");
		//$("input[name='c_enterprise_code']").attr("lay-verify", "required|licenseCode");
		$("input[name='c_enterprise_license']").attr("lay-verify", "isUpload");
		$("input[name='c_name']").attr("lay-verify", "required|zhName");
		$("input[name='c_front_photo']").attr("lay-verify", "isUpload");
		$("input[name='c_back_photo']").attr("lay-verify", "isUpload");
		  
	}
});	


//prov-city-area start
//must_address start
	var defaults = {
		s1: 'provid',
		s2: 'cityid',
		s3: 'areaid',
		v1: null,
		v2: null,
		v3: null
	
	};	 
	treeSelect(defaults);	//prov-city-area use
	
	$("input[name='ass_must_provid']").attr( "value" , $("#provid").find("option:selected").text()) ;	//I add for must address that default reading
	$("input[name='ass_must_cityid']").attr( "value" , $("#cityid").find("option:selected").text()) ;	//I add for must address that default reading
	$("input[name='ass_must_areaid']").attr( "value" , $("#areaid").find("option:selected").text()) ;	//I add for must address that default reading
	
	function treeSelect(config) {
		config.v1 = config.v1 ? config.v1 : "";
		config.v2 = config.v2 ? config.v2 : "";
		config.v3 = config.v3 ? config.v3 : "";
		
		$("<option value='910000'>"+getProv+"</option>").appendTo($form.find('select[name=' + config.s1 + ']'));
		$.each(threeSelectData, function (k, v) {
			appendOptionTo($form.find('select[name=' + config.s1 + ']'), k, v.val, config.v1);
		});
		form.render();
		cityEvent(config);
		areaEvent(config);
		form.on('select(' + config.s1 + ')', function (data) {
			$("input[name='ass_must_provid']").attr( "value" , $("#provid").find("option:selected").text()) ;	//I add for must address			
			cityEvent(data);
			
			form.on('select(' + config.s2 + ')', function (data) {
				$("input[name='ass_must_cityid']").attr( "value" , $("#cityid").find("option:selected").text()) ;	//I add for must address				
				areaEvent(data);
				
			});
		});
	
		function cityEvent(data) {
			$form.find('select[name=' + config.s2 + ']').html("");
			config.v1 = data.value ? data.value : config.v1;
			
			$("<option value='910100'>"+getCity+"</option>").appendTo($form.find('select[name=' + config.s2 + ']'));		
			$.each(threeSelectData, function (k, v) {
				if (v.val == config.v1) {
					if (v.items) {
						$.each(v.items, function (kt, vt) {
							appendOptionTo($form.find('select[name=' + config.s2 + ']'), kt, vt.val, config.v2);
						});
					}
				}
			});
			form.render();
			config.v2 = $('select[name=' + config.s2 + ']').val();
			areaEvent(config);
		}
		function areaEvent(data) {
			$form.find('select[name=' + config.s3 + ']').html("");
			config.v2 = data.value ? data.value : config.v2;
			
			$("<option value='910101'>"+getArea+"</option>").appendTo($form.find('select[name=' + config.s3 + ']'));
			$.each(threeSelectData, function (k, v) {
				if (v.val == config.v1) {
					if (v.items) {
						$.each(v.items, function (kt, vt) {
							if (vt.val == config.v2) {
								$.each(vt.items, function (ka, va) {
									appendOptionTo($form.find('select[name=' + config.s3 + ']'), ka, va, config.v3);
								});
							}
						});
					}
				}
			});
			form.render();
			form.on('select(' + config.s3 + ')', function (data) {
				$("input[name='ass_must_areaid']").attr( "value" , $("#areaid").find("option:selected").text()) ;	//I add for must address
			});
		}
		function appendOptionTo($o, k, v, d) {
			var $opt = $("<option>").text(k).val(v);
			if (v == d) { $opt.attr("selected", "selected") }
			$opt.appendTo($o);
		}	
	}

//prov-city-area end

//Monitoring the check box  must under prov-city-area
form.on('checkbox(expCheckbox)', function(data){			
	$(".shop_checkbox input[name='like[]']").attr('disabled', true);
   	if ($(".shop_checkbox input[name='like[]']:checked").length >= 3) {
    	$(".shop_checkbox input[name='like[]']:checked").attr('disabled', false);
   	} else {
    	$(".shop_checkbox input[name='like[]']").attr('disabled', false);
   	}
});

    	
//Executing an uploaded images instance
var uploadInst = upload.render({
	elem: '#img-upload' //Binding element
    ,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
	,size: 1000 //Limit the size of the picture, unit KB
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
	  $("input[name='p_front_photo']").attr('value', imgUrl); 
	  	  
    }
    ,error: function(){
      //Request an exception callback
    }
	
});


//Executing an uploaded file instance
upload.render({
	elem: '#photo-upload' //Binding element
    ,url: '/submission_upload/upfilesproccess.php?uploadact=file' //Upload interface
	,size: 1000 //Limit the size of the picture, unit KB
	,before: function(obj){
      //According to the local file, does not support IE8
      obj.preview(function(index, file, result){
		//
		$('#locaphoto').attr('src', result); //Picture linking（base64）	
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
	  var zipUrl="/submission_upload/upfiles/"+res.message;
	  $("input[name='p_back_photo']").attr('value', zipUrl); 	  
	  	  
    }
    ,error: function(){
      //Request an exception callback
    }
	
});


upload.render({
	elem: '#img-upload2' //Binding element
    ,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
	,size: 1000 //Limit the size of the picture, unit KB
	,before: function(obj){
      //According to the local picture, does not support IE8
      obj.preview(function(index, file, result){
        $('#locaimgzz').attr('src', result); //Picture linking（base64）
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
	  $("input[name='c_enterprise_license']").attr('value', imgUrl); 
	  	  
    }
    ,error: function(){
      //Request an exception callback
    }
	
});

upload.render({
	elem: '#img-upload3' //Binding element
    ,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
	,size: 1000 //Limit the size of the picture, unit KB
	,before: function(obj){
      //According to the local picture, does not support IE8
      obj.preview(function(index, file, result){
        $('#locaimg2').attr('src', result); //Picture linking（base64）
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
	  $("input[name='c_front_photo']").attr('value', imgUrl); 
	  	  
    }
    ,error: function(){
      //Request an exception callback
    }
	
});

upload.render({
	elem: '#img-upload4' //Binding element
    ,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
	,size: 1000 //Limit the size of the picture, unit KB
	,before: function(obj){
      //According to the local picture, does not support IE8
      obj.preview(function(index, file, result){
        $('#locaimg3').attr('src', result); //Picture linking（base64）
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
	  $("input[name='c_back_photo']").attr('value', imgUrl); 
	  	  
    }
    ,error: function(){
      //Request an exception callback
    }
	
});

upload.render({
	elem: '#logoimg-upload' //Binding element
    ,url: '/submission_upload/upfilesproccess.php?uploadact=images' //Upload interface
	,size: 300 //Limit the size of the picture, unit KB
	,before: function(obj){
      //According to the local picture, does not support IE8
      obj.preview(function(index, file, result){
        $('#logoimg').attr('src', result); //Picture linking（base64）
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
	  $("input[name='logo_img']").attr('value', imgUrl); 
	  	  
    }
    ,error: function(){
      //Request an exception callback
    }
	
});


			  
	  //Custom validation rules
	  form.verify({
		shopName: function(value){
		  if(value.length < 3  && value.length<=20){
			return '至少得3个字符啊';
		  }
		  return false;
		}
		,longName: function(value){
			if(!(value.match(/^[\u4E00-\u9FA5]+$/) && value.length>=2 && value.length<=20)){
				return '名称的长度应是2到20个汉字！';
			}
			return false;
		}
		,licenseCode: function(value){
			if(!(value.match(/^(?:(?![IOZSV])[\dA-Z]){2}\d{6}(?:(?![IOZSV])[\dA-Z]){10}$/))){
				return '请填写正确的营业执照代码！';
			}
			return false;
		}
		,isNOCheck: function(value){	
			if ($("input[name='like[]']:checked").length == 0) {
    			return '请选择擅长领域';				
   			}
			//form.render('checkbox');
			return false;				
		},
		isEmptyEdit: function(value){
			if(value==""){
				return '请在编辑器中输入内容';
			}
			return false;				
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
		/*,nodisplay: function(value){
			
			var regphone   = /^1[3-9]\d{9}$/;
			var regemail   = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/ ;
			var reghttp    = /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
			
			value.replace(regphone, '');
			value.replace(regemail, '');
			value.replace(reghttp, '');
			
			form.render('select');	
			return false;				
		}*/

	  });
	  
	  //Consent platform agreement can be submitted
	/*form.on('checkbox(ischeckbox)', function(data){
				  
		  if(data.elem.checked){
			$(".formSubmit").css({"background-color":"#FF5722"}); 
			$(".formSubmit").removeAttr('disabled');
		  }else{
			$(".formSubmit").css({"background-color":"#aaa"});
			$(".formSubmit").attr({"disabled":"true"}); 		  
		  }
	 });*/
	  

	
	//Asynchronous Ajax submission form
	var submitUrl = "/other/user_shop_come_in";
	
	form.on('submit(shopFormSubmit)', function(data){
    	//layer.msg(JSON.stringify(data.field));
   		
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				//$('#htxsubForm')[0].reset();	//Clearing form data after submission
				//layer.msg(JSON.stringify(rdata));
				//console.log(rdata);	
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
