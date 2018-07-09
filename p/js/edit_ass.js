// JavaScript Document
layui.use(['jquery', 'element', 'laydate', 'upload', 'form', 'layer'], function(){
	var $ = layui.$; 
  	var element = layui.element,
	laydate = layui.laydate,
	//upload = layui.upload,	
    form = layui.form,
	layer3 = layui.layer;
	var $form = $('#htxsubForm');	//prov-city-area use
    	
	
    form.on('select(bigcat)',function (data) {
		
		/*console.log(data);
		console.log(data.elem);
		console.log(data.value);*/
		
		$('.dynimcBox').empty(); 
               
		if(data.value==0){			
			var option = '<option value="0">请选择子类别</option>'; 
			$('.dynimcBox').empty();			
		}else if(data.value==1){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=10",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
								
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
			
			
			
		}else if(data.value==2){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=11",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
					
		}else if(data.value==3){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=12",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
					
		}else if(data.value==4){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=13",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
										
		}else if(data.value==5){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=14",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
			
		}else if(data.value==6){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=15",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
			
		}else if(data.value==7){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=16",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
			
		}else if(data.value==8){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=17",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
			
		}else if(data.value==9){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=18",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
			
		}else if(data.value==10){
			$.ajax({
				//Backstage returns the corresponding data based on action
				url: "/subcats?action=19",
				type: 'get',
				success: function(data) {
					//alert(data);					
					$("#subcat").empty().html('<option value="">请选择对应子类别</option>'+data);					
					form.render('select');														
				}
			});
					
			form.on('select(subcat)', function(data){
				$.ajax({
					//Backstage returns the corresponding data based on action
					url: "/other/standard?action="+data.value+"&arg=standard",
					type: 'get',
					success: function(data) {											
						$(".dynimcBox").empty().html(data);																		
					}
				});				
			});
		}			                						
		
		$('select[name=subcat]').empty().append(option);
		form.render('select');			

    });
		
	  /*laydate.render({
		elem: '#time1' //Specified element
	  });
		
	  laydate.render({
		elem: '#time2' //Specified element
	  });*/
    // 对Date的扩展，将 Date 转化为指定格式的String  
    // 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，   
    // 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)   
    Date.prototype.Format = function (fmt) { //author: meizz   
        var o = {  
            "M+": this.getMonth() + 1, //月份   
            "d+": this.getDate(), //日   
            "H+": this.getHours(), //小时   
            "m+": this.getMinutes(), //分   
            "s+": this.getSeconds(), //秒   
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度   
            "S": this.getMilliseconds() //毫秒   
        };  
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));  
        for (var k in o)  
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + 

o[k]).substr(("" + o[k]).length)));  
        return fmt;  
    } 
	var nowTime= new Date().Format("yyyy-MM-dd");
	  
	  
	  laydate.render({
		elem: '#timeend', //Specified element
		min: nowTime
	  });

	  laydate.render({
		elem: '#timestart', //Specified element
		min: nowTime
	  });
	  
	  //$(document).on('mouseover','#time1, #time2, #timeend',function () {
	  $(document).on('mouseover','#time1, #time2, #timestart, #timeend',function () {
            $(this).blur();
      });
	  	  
	  //Custom validation rules
	  form.verify({
		title: function(value){
		  if(value.length < 5){
			return '标题至少得5个字符啊';
		  }
		  return false;
		}
		,isEmptyEdit: function(value){
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
	  form.on('checkbox(ischeckbox)', function(data){
		  if(data.elem.checked){
			$(".formSubmit").css({"background-color":"#FF5722"}); 
			$(".formSubmit").removeAttr('disabled');
		  }else{
			$(".formSubmit").css({"background-color":"#aaa"});
			$(".formSubmit").attr({"disabled":"true"}); 		  
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
	
	
	//Asynchronous Ajax submission form
	var submitUrl = "/other/update_ass";
	
	form.on('submit(formSubmit)', function(data){
		
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, 同步
			success:function(rdata) {
				/*$('#htxsubForm')[0].reset();	//Clearing form data after submission
				layer.msg(JSON.stringify(rdata));*/
				//console.log(rdata);	
				layer3.open({
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
