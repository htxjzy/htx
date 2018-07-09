/**reglog JS**/
function reghtx(obj){
	layui.use('layer', function(){ 
		var $ = layui.$ 
		,layer = layui.layer;
		
		//$("#login-htx").empty();
		
		layer.open({
			title: false,
			type: 1,
			content: $('#reg-htx'),
			area: ['530px', '475px']
		});
	});
}

function loginhtx(obj){	

	layui.use('layer', function(){ 
		var $ = layui.$ 
		,layer2 = layui.layer;
		
		//$("#reg-htx").empty();
		
		layer2.open({
			title: false,
			type: 1,
			content: $('#login-htx'),
			area: ['530px', '475px']
		});
	});
		
}


//-----------------------------------------------
var SignUp = new Object();
$(function () {
	var postUrl = "/other/dataproccess";
    var IsBindAccount = '0';
    var mod = "phone"; //default phone
    //exchange between phone and email
    var tab = $("#btn_list a"),
    text = $(".reg_bnt");
    if (tab.length != text.length)
        return;
    for (var i = 0; i < tab.length; i++) {
        tab[i].id = i;
        tab[i].onclick = function () {
            SignUp.ClearTip();
            if (IsBindAccount == "1") return;
            for (var j = 0; j < tab.length; j++) {
                text[j].style.display = "none";				
                tab[j].className = "";
            }
            text[this.id].style.display = "block";
            tab[this.id].className = "active";

            var vtype = this.id == 0 ? "phone" : "email";
            mod = vtype;
        }
    }
    //手机或者邮箱找回方式切换
    $('.get_title a').on('click',function () {
        SignUp.ClearTip();//清除验证状态
        $(this).addClass('active').siblings().removeClass('active');
        var num= $('.get_title a').index(this);
        $(".get_type").eq(num).show().siblings('.get_type').hide();
        var vtype = num == 0 ? "phone" : "email";//手机或者邮箱方式找回判断
        mod = vtype;
        var number = $(this).index();
        number =number+1;
        if(number == '1' && number != '' && number != 'undefined'){
            $('#title').text("获取手机验证码");
        }else {
            $('#title').text("获取邮箱验证码");
        }
    });

    $("#login_btn a").on('click',function () {
        SignUp.ClearTip();//清除验证状态
        $(this).addClass('active').siblings().removeClass('active');
        var num= $('#login_btn a').index(this);
        $(".login_mode").eq(num).show().siblings('.login_mode').hide();
        if (num == '1'){
            mod = "phone"
        }else if (num == "2"){
            mod = "account"
        }

    });

	String.prototype.rTrim = function () {
		var re_r = /([.\w]*)[ ]+$/;
		return this.replace(re_r, "$1");
	};
	
	String.prototype.lTrim = function () {
		var re_l = /^[ ]+(.*)/
		return this.replace(re_l, "$1");
	};
	
	String.prototype.trim = function () {
		return this.lTrim().rTrim();
	};


	var IsSendEmail = false;
	var IsSendText = false;
	var IsClick = 0;

	// 用于操作成功后, 转向其它页面时不改变按钮状态, DoAjax 体验用的
	var IsSuccess = false;
	
	/** 数字 + 字母组合，长度 6~16 */
	//var regexPassword = /^(?![^a-zA-Z]+$)(?!\D+$).{6,16}$/; 之前
	//var regexPassword = /^[a-zA-Z0-9_-]{6,16}$/ ;
	var regexPassword = /([a-zA-Z0-9!@#$%^&*()_?<>{}]){6,16}/;
	
	/** Email */
	var regexEmail = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
	
	/** 11位纯数字（手机使用） */
	var regexPhone = /^1(3|5|7|8)\d{9}$/;
	
	/* 清除验证状态信息 */
	SignUp.ClearTip = function () {
		$("#errortip").text('');
		$(".error").removeClass("error");
		$("#errordiv").addClass("layui-hide");
	};
	/*清除快捷登录状态信息*/
	SignUp.ClearTipQuick = function () {
		$("#errorquick").text('');
		$(".error").removeClass("error");
		$("#errordivquick").addClass("layui-hide");
	};
	
	/* 清除密码验证状态信息 */
	SignUp.ClearPasswordTip = function () {
		$("#errortip").text('');
		$("#txtPassword").removeClass("error");
		$("#errordiv").addClass("layui-hide");
	};
	SignUp.ClearPasswordConfirmTip = function () {
		$("#errortip").text('');
		$("#txtPasswordConfirm").removeClass("error");
		$("#errordiv").addClass("layui-hide");
	};
	/*相关提示*/
	var phoneFormatError = "手机号格式不正确";
	var phoneEmpty = "手机号不能为空";
	var iphoneIsReged = "该手机已注册";
	var randomCodeEmpty = "随机码不能为空";
	var randomCodeError = "随机码错误";
	var codeEmpty = "验证码不能为空.";
	var codeError = "验证码错误.";
	var emailEmpyt = "邮箱不能为空";
	var emailError = "邮箱格式错误";
	var emailIsReged = "该邮箱已注册";
	var passwordEmpty = "请输入密码";
	var passwordFormatError = "密码不正确";
	var passwordError = "两次输入的密码不一致";
	var emailOrPhoneEmpyt = "账号不能为空";
	var emailOrPhoneError = "账号格式不正确（手机号/邮箱）";

	/*检测手机号*/
	SignUp.IsPhone = function () {
		SignUp.ClearTip();
		
		var bol = true;
		
		var iPhone = $("#txtiPhone").val().trim().toLowerCase();
		
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var postData = {
			iphoneIsRegistered: iPhone,
			htx_nonce_field_name: htx_nonce_field_name
		};

		if (iPhone == "" || iPhone == null || iPhone == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtiPhone").addClass("error");
			$("#errortip").text(phoneEmpty);
			bol = false;
			return false;
		}else if (!regexPhone.test(iPhone)) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtiPhone").addClass("error");
			$("#errortip").text(phoneFormatError);
			bol = false;
			return false;
		}
	
		$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			//dataType: 'json',
			data: postData,
			success: function (data) {
				if(data == "theIphoneRegistered"){
					$("#errordiv").removeClass("layui-hide");
					$("#txtiPhone").addClass("error");
					$("#errortip").text(iphoneIsReged);
					bol = false;						   
				}
			}
		});				
		return bol;
	};


	/* 检测邮箱 */
	SignUp.CheckEmail = function () {
		SignUp.ClearTip();		
		var bol = true;
	
		var emailId = "txtEmail";	
		var email = $("#" + emailId).val().trim().toLowerCase();
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var postData = {
			emailIsRegistered: email,
			htx_nonce_field_name: htx_nonce_field_name
		};
	
		if (email == "" || email == null || email == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#" + emailId).addClass("error");
			$("#errortip").text(emailEmpyt);
			bol = false;
			return false;
		}
	
		if (!regexEmail.test(email)) {
			$("#errordiv").removeClass("layui-hide");
			$("#" + emailId).addClass("error");
			$("#errortip").text(emailError);
			bol = false;
			return false;
		}
		
		$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			//dataType: 'json',
			data: postData,
			success: function (data) {			
				if(data == "theEmailRegistered"){
					$("#errordiv").removeClass("layui-hide");
					$("#" + emailId).addClass("error");
					$("#errortip").text(emailIsReged);	
					bol = false;			   
				}
			}
		});							
		return bol;
	};


	/* 检测邮箱验证码 */
	SignUp.CheckEmailCode = function () {
		SignUp.ClearTip();
		var code = $("#txtCode").val().trim();
		$("#errortip").text('');
		if (code == "" || code == null || code == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#emailCode").addClass("error");
			$("#errortip").text(codeEmpty);
			return false;
		}
        if (!(code.match(/^\+?[1-9][0-9]*$/))) {
            $("#errordiv").removeClass("layui-hide");
            $("#emailCode").addClass("error");
            $("#errortip").text("验证码格式不对");
            return false;
        }		
		return true;
	};
	/* 检测短信验证码 */
	SignUp.CheckCode = function () {
		SignUp.ClearTip();
		var iphoneCodeId = "iphoneCodeId";
		var htxcode = $("#" + iphoneCodeId).val().trim().toLowerCase();
		$("#errortip").text('');
	
		if (htxcode == "" || htxcode == null || htxcode == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#" + iphoneCodeId).addClass("error");
			$("#errortip").text(codeEmpty);
			return false;
		}

        if (!(htxcode.match(/^\+?[1-9][0-9]*$/))) {
            $("#errordiv").removeClass("layui-hide");
            $("#" + iphoneCodeId).addClass("error");
            $("#errortip").text("验证码格式不对");
            return false;
        }
	
		return true;
	};

	/*手机密码验证*/
	SignUp.CheckPassword = function () {
		SignUp.ClearPasswordTip();
	
		var password = $("#txtPassword").val().trim();
		$("#errortip").text('');
	
		if (password == "" || password == null || password == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtPassword").addClass("error");
			$("#errortip").text(passwordEmpty);
			return false;
		}
	
		if (!regexPassword.test(password)) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtPassword").addClass("error");
			$("#errortip").text(passwordFormatError);
			return false;
		}
	
		//return SignUp.CheckPasswordRepeat();
		return true;
	};

	/*邮箱密码验证*/
	SignUp.CheckPassword2 = function () {
	
		$("#errortip").text('');
		$("#txtPassword2").removeClass("error");
		$("#errordiv").addClass("layui-hide");		
		var password2 = $("#txtPassword2").val().trim();
		//$("#errortip").text('');	
		if (password2 == "" || password2 == null || password2 == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtPassword2").addClass("error");
			$("#errortip").text(passwordEmpty);
			return false;
		}	
		if (!regexPassword.test(password2)) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtPassword2").addClass("error");
			$("#errortip").text(passwordFormatError);
			return false;
		}	
		//return SignUp.CheckPasswordRepeat();
		return true;
	};

	SignUp.isAgree = function(){
	
		var isAgree = document.getElementById("agreement").checked;
		if (!isAgree) {
			$("#errordiv").removeClass("layui-hide");
			$("#errortip").text("请同意火天信协议");
			$('.sub-button a').addClass("bg-gay");
			return false;
		}
	 
	}

	$(document).on('click','.layui-form-checkbox',function () {
		 var isAgree = document.getElementById("agreement").checked;
		 if (!isAgree) {
			 $('#submit').addClass('bg-gay');
			 $('#submit').attr('disabled','disabled');
			  return false;
		 }else {
			 $('#submit').removeClass('bg-gay');
			 $('#submit').removeAttr('disabled','disabled');
		 }
	});
	
	$("#submit").hover(function (){
		$(this).css('background-color', '#fb152f');
	},function () {
		$(this).css('background-color', '#dd0b19');
	});


/**邮箱手机验证码用到的定时器**/
/**
获取手机验证码事件——
**/
SignUp.CheckbtnHtxSend = function(){

	if (!SignUp.IsPhone()) return false; 
	
	var phoneId = "txtiPhone";//手机号码
	var phone = $("#" + phoneId).val().trim();
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
    var postData = {
        phoneyanzheng: phone,
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
	
	var obj = $("#btnHtxSend");	
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
}//SignUp.CheckbtnHtxSend end

//获取邮箱验证码事件
SignUp.CheckbtnSend = function (){

if(SignUp.CheckEmail()){
	var emailId = "txtEmail";//邮箱验证码
	var email = $("#" + emailId).val().trim().toLowerCase();
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
    var postData = {
        emailyanzheng: email,
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
	
	var obj = $("#btnSend");	
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

}//SignUp.CheckbtnSend end

/**
 * 用户注册事件
 */ 
SignUp.CheckSubmit = function () {
    if (mod == "email") {
        if (!SignUp.CheckEmail()) return false;
		if (!SignUp.CheckPassword2()) return false;
        if (!SignUp.CheckEmailCode()) return false;
    }
    else {
        if (!SignUp.IsPhone()) return false;
		if (!SignUp.CheckPassword()) return false;
        if (!SignUp.CheckCode()) return false;		
    }

    var emailId = "txtEmail";//邮箱地址
    var emailcodeId = "txtCode";//邮箱验证码
    var phoneId = "txtiPhone";//手机号码
    var iphoneCodeId = "iphoneCodeId";//短信验证码
    var passwordId = "txtPassword";  //手机密码
    var passwordId2 = "txtPassword2";  //邮箱密码	

    var email = $("#" + emailId).val().trim().toLowerCase();
    var code = $("#" + emailcodeId).val();
    var phone = $("#" + phoneId).val().trim().toLowerCase();
    var smscode = $("#" + iphoneCodeId).val().trim().toLowerCase();
    var password = $("#" + passwordId).val().trim().toLowerCase();	
    var password2 = $("#" + passwordId2).val().trim().toLowerCase();	
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
	var redirect = $("input[name='regRedirect']").val();

    var postData = {
        email: email,
        phone: phone,
        code: code,
        smscode: smscode,
        password: password,	
		password2: password2,		
		htx_nonce_field_name: htx_nonce_field_name,
        mod: mod
    };
	
	var returnmsg = "注册失败";

    $.ajax({
        url: postUrl,
        type: 'post',
		//async:false,
        //dataType: 'json',
        data: postData,
        success: function(data) {					
			if(data=="regsuccess"){
				returnmsg = "注册成功";
			}
			if(data=="validateCodeError"){
				returnmsg = "验证码错误";
			}		
			layui.use('layer', function(){ 
				var $ = layui.$ 
				,layer = layui.layer;				
				layer.msg(returnmsg, { time:3000, shade:[0.7, '#393D49'] }, function(){
				  window.location.href=redirect; 
				});		 
			});	
        }
    });
};

    /*
     * passwordId2 是用于检测两次密码是否一致时使用的
     */
    SignUp.FunctionCheckPassword = function (passwordId, passwordId2, emptyError, formatError, repeatError) {
        SignUp.ClearTip();

        var password = $("#" + passwordId).val().trim();
        var regex = regexPassword;

        if (password == "" || password == null || password == undefined) {
            $("#errordiv").removeClass("layui-hide");
            $("#" + passwordId).addClass("error");
            $("#errortip").text(emptyError);
            return false;
        }

        if (!regex.test(password)) {
            $("#errordiv").removeClass("layui-hide");
            $("#" + passwordId).addClass("error");
            $("#errorip").text(formatError);
            return false;
        }

        return SignUp.FunctionCheckPasswordRepeat(passwordId, passwordId2, repeatError);
    };
    SignUp.FunctionCheckPasswordRepeat = function (passwordId, passwordConfirmId, repeatError) {
        var passwortd = $("#" + passwordId).val();
        var passwordConfirm = $("#" + passwordConfirmId).val();
        if (passwortd != "" && passwortd != null && passwortd != undefined
            && passwordConfirm != "" && passwordConfirm != null && passwordConfirm != undefined) {
            if (passwortd != passwordConfirm) {
                $("#errordiv").removeClass("layui-hide");
                $("#" + passwordId).addClass("error");
                $("#errortip").text(repeatError);
                return false;
            }
        }
        return true;
    };

///////////////////////////////Login页面使用Js///////////////////////////////

//Verify whether the phone number or the mailbox is correct when the account is logged in
	var whatTa = "iphone";
    SignUp.IsEmailOrPhone = function () { 
        SignUp.ClearTip();
        var eOrp = $("#EmailOrPhone").val().trim().toLowerCase();		
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();		
		var bol = true;
        if (eOrp == "" || eOrp == null || eOrp == undefined) {
            $("#errordiv").removeClass("layui-hide");
            $("#EmailOrPhone").addClass("error");
            $("#errortip").text(emailOrPhoneEmpyt);
            bol = false;
		}
		
		if( !regexEmail.test(eOrp) && !regexPhone.test(eOrp)){
			$("#errordiv").removeClass("layui-hide");
			$("#EmailOrPhone").addClass("error");
			$("#errortip").text(emailOrPhoneError);
			bol = false;		
		}
				
		if( regexEmail.test(eOrp) && !regexPhone.test(eOrp) ){	
			whatTa = "email";
			var postData = {
				emailExistInDb: eOrp,
				htx_nonce_field_name: htx_nonce_field_name
			};
			$.ajax({
				url: postUrl,
				type: 'post',
				async:false,
				//dataType: 'json',
				data: postData,
				success: function (data) {			
					if(data == "emailNotInDb"){
						$("#errordiv").removeClass("layui-hide");
						$("#EmailOrPhone").addClass("error");
						$("#errortip").text('邮箱不存在');	
						bol = false;			   
					}
				}
			});										
		}

		if( !regexEmail.test(eOrp) && regexPhone.test(eOrp) ){	
			whatTa = "iphone";	
			var postData = {
				iphoneExistInDb: eOrp,
				htx_nonce_field_name: htx_nonce_field_name
			};
			$.ajax({
				url: postUrl,
				type: 'post',
				async:false,
				//dataType: 'json',
				data: postData,
				success: function (data) {			
					if(data == "iphoneNotInDb"){
						$("#errordiv").removeClass("layui-hide");
						$("#EmailOrPhone").addClass("error");
						$("#errortip").text('手机不存在');	
						bol = false;			   
					}
				}
			});													
		}
				
        return bol;
    };

	//Check whether the slider is dragged or not
	SignUp.CheckDrag = function(){
		if($(".handler").hasClass("completeOk")){
			return true;
		}else{
			SignUp.ClearTip();
			$("#errortip").text('');
			$("#errordiv").removeClass("layui-hide");
			$("#EmailOrPhone").addClass("error");
			$("#errortip").text("请拖动滑块至最右边");		
			return false;	
		}
	}

	//Account login event
    SignUp.CheckPasswordSubmit = function () {
        if (!SignUp.IsEmailOrPhone()) return false;
        if (!SignUp.CheckPassword()) return false;
		if (!SignUp.CheckDrag()) return false;
		
		var username = $("#EmailOrPhone").val().trim();	
        var password = $("#txtPassword").val().trim();       
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var redirect = $("input[name='logRedirect']").val();

        var postData = { emailOrIphone: whatTa, username: username, password: password, htx_nonce_field_name: htx_nonce_field_name };
		
		var returnmsg ="";
				
        $.ajax({
            url: postUrl,
            type: 'post',
            //dataType: 'json',
            data: postData,
            success: function (data) {
				if(data=="pwdsuccess"){
					returnmsg = "登录成功";
				}
				if(data=="pwdfailure"){
					returnmsg = "登录失败";
				}		
				layui.use('layer', function(){ 
					var $ = layui.$ 
					,layer = layui.layer;				
					layer.msg(returnmsg, { time:3000, shade:[0.7, '#393D49'] }, function(){
					  window.location.href=redirect; 
					});		 
				});			
            }
        });
    };
    /* 检测快捷登录手机号 */
    SignUp.CheckQuickPhone = function () {
        SignUp.ClearTipQuick();
        $("#errorquick").text('');

        var phoneIdQuick = "phone";
        var phoneCk = $("#" + phoneIdQuick).val().trim().toLowerCase();
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();		
		var bol = true;

        if (phoneCk == "" || phoneCk == null || phoneCk == undefined) {
            $("#errordivquick").removeClass("layui-hide");
            $("#" + phoneIdQuick).addClass("error");
            $("#errorquick").text(phoneEmpty);
			bol = false;
            return false;
        }

        phoneCk = phoneCk.trim();

        if (!regexPhone.test(phoneCk)) {
            $("#errordivquick").removeClass("layui-hide");
            $("#" + phoneIdQuick).addClass("error");
            $("#errorquick").text(phoneFormatError);
			bol = false;
            return false;
        }
		
		if(regexPhone.test(phoneCk)){
			var postData = {
				iphoneExistInDb: phoneCk,
				htx_nonce_field_name: htx_nonce_field_name
			};
			$.ajax({
				url: postUrl,
				type: 'post',
				async:false,
				//dataType: 'json',
				data: postData,
				success: function (data) {			
					if(data == "iphoneNotInDb"){
						$("#errordivquick").removeClass("layui-hide");
						$("#" + phoneIdQuick).addClass("error");
						$("#errorquick").text('手机不存在');	
						bol = false;			   
					}
				}
			});			
		}

        return bol;
    };

    /*获取快捷登录手机验证码*/
    SignUp.CheckbtnHtxSendQuick = function () {
        if (!SignUp.CheckQuickPhone()) return false;
        var phoneyanzheng_login = $("#phone").val().trim().toLowerCase();
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
        var postData = {phoneyanzheng_login:phoneyanzheng_login,  htx_nonce_field_name:htx_nonce_field_name};

		$.ajax({
			url: postUrl,
			type: 'post',
			//dataType: 'json',
			data: postData,
			success: function (data) {			
				//alert(data.key1+'-'+data.key2+'-'+data.key3+'-'+data.key4);
				//alert(data);			
			}
		});			
	
		var obj = $("#btnSmsSend");	
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
			setTimeout(function(){ settime(obj) },1000)
		}

    };
	
    /* 检测快捷登录短信验证码 */
    SignUp.CheckQuickCode = function () {
        SignUp.ClearTipQuick();
        var iphoneyzm = "yzm";
        var htxcode = $("#" + iphoneyzm).val().trim().toLowerCase();
        $("#errorquick").text('');

        if (htxcode == "" || htxcode == null || htxcode == undefined) {
            $("#errordivquick").removeClass("layui-hide");
            $("#" + iphoneyzm).addClass("error");
            $("#errorquick").text(codeEmpty);
            return false;
        }
		
        if (!(htxcode.match(/^\+?[1-9][0-9]*$/))) {
            $("#errordivquick").removeClass("layui-hide");
            $("#" + iphoneyzm).addClass("error");
            $("#errorquick").text("验证码格式不对");
            return false;
        }

        return true;
    };
    /**
     * 快捷登录事件
     */
    SignUp.CheckQuickSubmit = function () {
        if (!SignUp.CheckQuickPhone()) return false;
        if (!SignUp.CheckQuickCode()) return false;

        var loginPhone = $("#phone").val().trim();
        var loginSmscode = $("#yzm").val().trim();
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var redirect = $("input[name='logRedirect']").val();
        var postData = { loginPhone: loginPhone, loginSmscode: loginSmscode, htx_nonce_field_name: htx_nonce_field_name };
		
		var returnmsg = "登录失败";
		
		$.ajax({
			url: postUrl,
			type: 'post',
			//dataType: 'json',
			data: postData,
			success: function (data) {			
				if(data=="logsuccess"){
					returnmsg = "登录成功";
				}
				if(data=="loginValidateCodeError"){
					returnmsg = "验证码错误";
				}		
				layui.use('layer', function(){ 
					var $ = layui.$ 
					,layer = layui.layer;				
					layer.msg(returnmsg, { time:3000, shade:[0.7, '#393D49'] }, function(){
					  window.location.href=redirect; 
					});		 
				});			
			}
		});		
    };
    /**
     * 用户忘记密码
     */
	/*检测手机号2*/
	SignUp.IsPhone2 = function () {
		SignUp.ClearTip();
		
		var bol = true;
		
		var iPhone = $("#txtiPhone").val().trim().toLowerCase();
		
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var postData = {
			iphoneExistInDb: iPhone,
			htx_nonce_field_name: htx_nonce_field_name
		};

		if (iPhone == "" || iPhone == null || iPhone == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtiPhone").addClass("error");
			$("#errortip").text(phoneEmpty);
			bol = false;
			return false;
		}else if (!regexPhone.test(iPhone)) {
			$("#errordiv").removeClass("layui-hide");
			$("#txtiPhone").addClass("error");
			$("#errortip").text(phoneFormatError);
			bol = false;
			return false;
		}
	
		$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			//dataType: 'json',
			data: postData,
			success: function (data) {
				if(data == "iphoneNotInDb"){
					$("#errordiv").removeClass("layui-hide");
					$("#txtiPhone").addClass("error");
					$("#errortip").text("该手机不存在");
					bol = false;						   
				}
			}
		});				
		return bol;
	};

/**
获取手机验证码事件2——
**/
SignUp.CheckbtnHtxSend2 = function(){

	if (!SignUp.IsPhone2()) return false; 
	
	var phoneId = "txtiPhone";//手机号码
	var phone = $("#" + phoneId).val().trim();
	var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
    var postData = {
        phoneyanzheng_pwd: phone,
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
	
	var obj = $("#btnHtxSend");	
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
}//SignUp.CheckbtnHtxSend2 end
	
	
	/* 检测邮箱2 */
	SignUp.CheckEmail2 = function () {
		SignUp.ClearTip();		
		var bol = true;
	
		var emailId = "txtEmail";	
		var email = $("#" + emailId).val().trim().toLowerCase();
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var postData = {
			emailExistInDb: email,
			htx_nonce_field_name: htx_nonce_field_name
		};
	
		if (email == "" || email == null || email == undefined) {
			$("#errordiv").removeClass("layui-hide");
			$("#" + emailId).addClass("error");
			$("#errortip").text(emailEmpyt);
			bol = false;
			return false;
		}
	
		if (!regexEmail.test(email)) {
			$("#errordiv").removeClass("layui-hide");
			$("#" + emailId).addClass("error");
			$("#errortip").text(emailError);
			bol = false;
			return false;
		}
		
		$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			//dataType: 'json',
			data: postData,
			success: function (data) {			
				if(data == "emailNotInDb"){
					$("#errordiv").removeClass("layui-hide");
					$("#" + emailId).addClass("error");
					$("#errortip").text("该邮箱不存在");	
					bol = false;			   
				}
			}
		});							
		return bol;
	};	
	
//获取邮箱验证码事件2
SignUp.CheckbtnSend2 = function (){

	if(SignUp.CheckEmail2()){
		var emailId = "txtEmail";//邮箱验证码
		var email = $("#" + emailId).val().trim().toLowerCase();
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
		var postData = {
			emailyanzheng: email,
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
		
		var obj = $("#btnSend");	
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
}//SignUp.CheckbtnSend2 end
	 
	 
    SignUp.CheckSubmitForgotPassword =function () {

        if ( mod == "email") {
            if (!SignUp.CheckEmail2()) return false;
            if (!SignUp.CheckEmailCode()) return false;
        }
        else {
            if (!SignUp.IsPhone2()) return false;           
            if (!SignUp.CheckCode()) return false;
        }

        var iPhone = $("#txtiPhone").val().trim();
        var code = $("#iphoneCodeId").val().trim();
        var emailNname = $("#txtEmail").val().trim();
        var emailCode = $("#txtCode").val().trim();
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();

        var postData ={
            iphone:iPhone,
            smscode:code,
            email:emailNname,
            code:emailCode,
            modForgetPwd:mod,
			htx_nonce_field_name:htx_nonce_field_name
        };
		
		var bol = false;
		$.ajax({
			url: postUrl,
			type: 'post',
			async:false,
			data: postData,
			success: function (data) {			
				if(data=="thiscodeOK"){
					bol = true;
				}else{
					layui.use('layer', function(){ 
						var $ = layui.$ 
						,layer2 = layui.layer;
						layer2.msg(data, {
						  icon: 5,
						  time: 3000, //3s close（default:3s）
						  shade: [0.7, '#393D49']
						});   
					});	
				}
			}
		});	
		return bol; 
    };

	

/*验证两次密码是否一致*/
SignUp.CheckPasswordRepeat = function () {
    var password = $("#txtPassword").val();
    var passwordConfirm = $("#txtPasswordConfirm").val();
    if (password != "" && password != null && password != undefined && passwordConfirm != "" && passwordConfirm != null && passwordConfirm != undefined) {
        if (password != passwordConfirm) {
            $("#errordiv").removeClass("layui-hide");
            $("#txtPasswordConfirm").addClass("error");
            $("#errortip").text(passwordError);
            return false;
        }
    }
    return true;
};

SignUp.CheckPasswordConfirm = function () {
    SignUp.ClearPasswordTip();
    SignUp.ClearPasswordConfirmTip();
    var password = $("#txtPasswordConfirm").val().trim();
    $("#errortip").text('');

    if (password == "" || password == null || password == undefined) {
        $("#errordiv").removeClass("layui-hide");
        $("#txtPasswordConfirm").addClass("error");
        $("#errortip").text(passwordEmpty);
        return false;
    }

    if (!regexPassword.test(password)) {
        $("#errordiv").removeClass("layui-hide");
        $("#txtPasswordConfirm").addClass("error");
        $("#errortip").text(passwordFormatError);
        return false;
    }

    return SignUp.CheckPasswordRepeat();
};

//Reset password submission
    SignUp.ResetPassWord = function () {
        if (!SignUp.CheckPassword()) return false;
        if (!SignUp.CheckPasswordConfirm()) return false;
        var password = $("#txtPassword").val().trim();//password
        var againPassword = $('#txtPasswordConfirm').val().trim();//confirm password
		var htx_nonce_field_name = $("input[name='htx_nonce_field_name']").val();
        var postData = {password:password,againPassword:againPassword,htx_nonce_field_name:htx_nonce_field_name};
		$.ajax({
			url: postUrl,
			type: 'post',
			data: postData,
			success: function (data) {		
				if(data=="resetpwdOK"){
					var displaydata = "修改密码成功";
				}else{
					var displaydata = "修改密码失败";				
				}
				layui.use('layer', function(){ 
					var $ = layui.$ 
					,layer3 = layui.layer;
					layer3.open({
						title: false,
						area: '280px',
						content:displaydata,
						yes: function(index, layero){
							//window.location.href="/other/user_login"; 
							window.location.href="/"; 
							layer.close(index); 
						},
						cancel: function(index, layero){
							//window.location.href="/other/user_login"; 
							window.location.href="/"; 
							layer.close(index);
						}    
					});  
				});	
			}
		});		
    }
	
});	//$(function() end