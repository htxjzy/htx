// JavaScript Document
layui.use(['jquery', 'element', 'form', 'layer'], function(){
	var $ = layui.$; 
  	var element = layui.element,
	laydate = layui.laydate,
	//upload = layui.upload,	
    form = layui.form,
	layer = layui.layer;

	  
	  //Custom validation rules
	  form.verify({
		title: function(value){
		  if(value.length < 5){
			return '标题至少得5个字符啊';
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
		/*,nodisplay: function(value){
			
			var regphone   = /^1[3-9]\d{9}$/;
			var regemail   = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/ ;
			var reghttp    = /(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
			
			value.replace(regphone, '******');
			value.replace(regemail, '******');
			value.replace(reghttp, '******');
			
			form.render('select');	
			return false;				
		}*/

	  });
	  
//editor focus on
var postUrl = "/other/dataproccess";
function validateCondition(){
	var bool = true;
	var bid_valid_provinceAndcity = $("input[name='bid_for_id']").val();
	var cur_user_id = $("input[name='bid_cur_user_id']").val();
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
	var postData = {
			bid_valid_provinceAndcity:bid_valid_provinceAndcity,
			cur_user_id: cur_user_id,
			htx_nonce_field_name:htx_nonce_field_name							
		}
	$.ajax({
		type:"post",
		url: postUrl,
		data: postData,
		success:function(data) {
			if('youcanbid'!=data){
				layer.open({
					title: false,
					content: data,
					yes: function(index, layero){
						//do something
						location.reload();
						layer.close(index); 
					},
					cancel: function(index, layero){
						//do something 
						location.reload();
						layer.close(index);
					}    
				});
				bool = false;
			}else{
				bool = true;			
			}
		}
	});	//$.ajax end
	return bool;	  
}

var vcObj = document.getElementById("v-condiction");
vcObj.onfocus = function(){ validateCondition(); }
ue3.onfocus=function(){ validateCondition(); }

ue3.onblur=function(){	
	if(!ue3.hasContents()){ 
		layer.open({
			title: false,
			content: '请填写内容信息',
			yes: function(index, layero){
				//do something
				//location.reload();
				layer.close(index); 
			},
			cancel: function(index, layero){
				//do something 
				//location.reload();
				layer.close(index);
			}    
		});  //end layer.open 				
	}
}
//editor focus on END
	
	
	//Asynchronous Ajax submission form
	//var submitUrl = "/other/submission_insert";
	var submitUrl = "/other/dataproccess";
	
	form.on('submit(formbidbutton)', function(data){
				
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
						location.reload();
						layer.close(index); 
					},
					cancel: function(index, layero){
						//do something 
						location.reload();
						layer.close(index);
					}    
				});    											
			}
		});
		//layer.msg(JSON.stringify(data.field));
		
		return false;		
		

	});//formSubmit end	    
});