// JavaScript Document
var AuthStart = new Object();
$(function () {
	var regexMobile = /^1(3|5|7|8)\d{9}$/;
	var regexEmail = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;		
	var regexMcode = /^[0-9]*$ /;			
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();	
	var postUrl = "/other/dataproccess";

    /*** check mobile ***/
    AuthStart.CheckMobile = function () {		
		var mobile = $("#mobile-auth input[name='mobile']").val();	//write in the event function
		var msmcode = $("#mobile-auth input[name='msmcode']").val();	//write in the event function		
		if (!regexMobile.test(mobile)) {			
			$("#mobile-auth input[name='mobile']").css({"border":"1px solid #e4393c"});
			$("#mobile-auth input[name='mobile']").parents(".layui-form-item").find(".auth-error").text("请输入正确的手机号码");
			$("#mobile-auth button[lay-filter='mobilesubmit']").attr("disabled",true);			
			return false;
		}
		var bol = true;		
		var postData = {
			mobile_auth:"bindMobileAuth",
			mobile: mobile,
			htx_nonce_field_name: htx_nonce_field_name
		};
		$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			//dataType: 'json',
			data: postData,
			success: function (data) {			
				if(data == "theMobileHasBeenBind"){
					$("#mobile-auth input[name='mobile']").css({"border":"1px solid #e4393c"});
					$("#mobile-auth input[name='mobile']").parents(".layui-form-item").find(".auth-error").text("该手机已被绑定");
					$("#mobile-auth button[lay-filter='mobilesubmit']").attr("disabled",true);
					bol = false;			   
				}else{
					$("#mobile-auth input[name='mobile']").css({"border":"1px solid #c9c9c9"});
					$("#mobile-auth input[name='mobile']").parents(".layui-form-item").find(".auth-error").text("");
					$("#mobile-auth button[lay-filter='mobilesubmit']").attr("disabled",false);
					bol = true;				
				}
			}
		});	
		return bol;	
    }
	
	/*** send msmcode ***/
	AuthStart.SendMsmCode = function(){
		if (!AuthStart.CheckMobile()) return false; 
		var mobile = $("#mobile-auth input[name='mobile']").val();
    	var postData = {
			smscode_auth:"getMsmcode",
        	mobile: mobile,
			htx_nonce_field_name: htx_nonce_field_name
    	};	
		$.ajax({
			url: postUrl,
			type: 'post',
			//dataType: 'json',
			data: postData,
			success: function (data) {
				//alert(data);						
			}
		});
		var obj = $("#btnGetMsmcode");	
		var countdown=60;
		settime(obj);
		function settime(obj) {
			if (countdown == 0) {
				$(obj).css('background-color', '#5FB878');
				$(obj).attr("disabled",false);
				$(obj).empty().text("获取验证码");
				countdown = 60;
				return;
			} else {
				$(obj).css('background-color', '#898989');
				$(obj).attr("disabled",true);
				$(obj).text("(" + countdown + ") s 发送中");
				countdown--;
			}
			setTimeout(function(){ settime(obj) },1000);
		}	
	}
	
	/*** check email ***/
    AuthStart.CheckEmail = function () {
		var email = $("#email-auth input[name='email']").val();	
		var emacode = $("#email-auth input[name='emacode']").val();
		if (!regexEmail.test(email)) {
			$("#email-auth input[name='email']").css({"border":"1px solid #e4393c"});
			$("#email-auth input[name='email']").parents(".layui-form-item").find(".auth-error").text("请输入正确的邮箱");
			$("#email-auth button[lay-filter='emailsubmit']").attr("disabled",true);
			return false;
		}
		var bol = true;		
		var postData = {
			email_auth:"bindEmailAuth",
			email: email,
			htx_nonce_field_name: htx_nonce_field_name
		};
		$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			//dataType: 'json',
			data: postData,
			success: function (data) {			
				if(data == "theEmailHasBeenBind"){
					$("#email-auth input[name='email']").css({"border":"1px solid #e4393c"});
					$("#email-auth input[name='email']").parents(".layui-form-item").find(".auth-error").text("该邮箱已被绑定");
					$("#email-auth button[lay-filter='emailsubmit']").attr("disabled",true);
					bol = false;			   
				}else{
					$("#email-auth input[name='email']").css({"border":"1px solid #c9c9c9"});
					$("#email-auth input[name='email']").parents(".layui-form-item").find(".auth-error").text("");
					$("#email-auth button[lay-filter='emailsubmit']").attr("disabled",false);
					bol = true;				
				}
			}
		});	
		return bol;			
	}
	
	/*** send emacode ***/
	AuthStart.SendEmaCode = function(){
		if (!AuthStart.CheckEmail()) return false; 
		var email = $("#email-auth input[name='email']").val();
    	var postData = {
			emacode_auth:"getEmacode",
        	email: email,
			htx_nonce_field_name: htx_nonce_field_name
    	};	
		$.ajax({
			url: postUrl,
			type: 'post',
			//dataType: 'json',
			data: postData,
			success: function (data) {
				//alert(data);						
			}
		});
		var obj = $("#btnGetEmacode");	
		var countdown=60;
		settime(obj);
		function settime(obj) {
			if (countdown == 0) {
				$(obj).css('background-color', '#5FB878');
				$(obj).attr("disabled",false);
				$(obj).empty().text("获取验证码");
				countdown = 60;
				return;
			} else {
				$(obj).css('background-color', '#898989');
				$(obj).attr("disabled",true);
				$(obj).text("(" + countdown + ") s 发送中");
				countdown--;
			}
			setTimeout(function(){ settime(obj) },1000);
		}	
	}



})	// end $(function ()


layui.use(['jquery', 'element', 'form', 'layer'], function(){
	var $ = layui.$; 
  	var element = layui.element,
    form = layui.form,
	layer = layui.layer;
    	
/**#mobile-auth pop JS**/

$("a.mobile-auth").click(function(){
	//layer.close(layer.index);
	layer.closeAll();
	layer.open({
		title: false,
		type: 1,
		content: $('#mobile-auth'),
		area: ['400px', '275px']
	});
			
});

$("a.email-auth").click(function(){
	//layer.close(layer.index);
	layer.closeAll();
	layer.open({
		title: false,
		type: 1,
		content: $('#email-auth'),
		area: ['400px', '275px']
	});
			
});


//Asynchronous Ajax submission form
var submitUrl = "/other/dataproccess";
//var userid = $("input[name='userid_auth']").val();
var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
	
				  
	//Custom validation rules
	form.verify({
		phoneIsExist: function(value){
			
			var postData = {
				mobile_auth: "bindMobileAuth",
				//userid: userid,
				mobile: value,
				htx_nonce_field_name: htx_nonce_field_name
			};
	
			$.ajax({
				url: submitUrl,
				type: 'post',
				async:false,
				//dataType: 'json',
				data: postData,
				success: function (data) {
					if(data == value){
						return '该手机号码已被绑定';											   
					}
				}
			});							

		},
		emailIsExist: function(value){
			if(!(value.match(regexEmail))){
				return '该邮箱已被绑定';
			}
			return false;	
		}

	});
	  	
	form.on('submit(mobilesubmit)', function(data){
    	//layer.msg(JSON.stringify(data.field));
   		
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			success:function(rdata) {
				if(rdata.reg=="mobileBindSuccess"){	
					layer.open({
						title: false,
						content:"手机绑定成功",
						yes: function(index, layero){
							//do something
							window.location.reload();
							
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
				if(rdata.reg=="msmcodeError"){	
					layer.msg("验证码错误");
				}				
			}
		});
		//layer.msg(JSON.stringify(data.field));
		
		return false;		
		

	});//formSubmit end	
	
	form.on('submit(emailsubmit)', function(data){  		
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			success:function(rdata) {
				if(rdata.reg=="emailBindSuccess"){	
					layer.open({
						title: false,
						content:"邮箱绑定成功",
						yes: function(index, layero){
							//do something
							window.location.reload();
							
							layer.close(index); 
						},
						cancel: function(index, layero){
							//do something 
							window.location.reload();
							layer.close(index);
						}    
					}); 
				}
				if(rdata.reg=="emacodeError"){	
					layer.msg("验证码错误");
				}													
			}
		});
		//layer.msg(JSON.stringify(data.field));
		
		return false;		
		

	});//formSubmit end	    
  
  
});
