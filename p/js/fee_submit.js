// JavaScript Document
layui.use(['jquery', 'element', 'laydate', 'upload', 'form', 'layer'], function(){
	var $ = layui.$; 
  	var element = layui.element,
	laydate = layui.laydate,
    form = layui.form,
	layer = layui.layer;

	//Monitoring the check box
	form.on('checkbox(payCheckbox)', function(data){			
		$("input[name='like[]']").attr('disabled', true);
		if ($("input[name='like[]']:checked").length >= 1) {
			$("input[name='like[]']:checked").attr('disabled', false);
		} else {
			$("input[name='like[]']").attr('disabled', false);
		}
	});

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
			//if(!value.match(/^\+?[1-9][0-9]*$/)){  //请输入正整数  
			if(!value.match(/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/)){
				return '请输入金额数';
			}
			return false;				
		}
		,isNOCheck: function(value){	
			if ($("input[name='like[]']:checked").length == 0) {
    			return '请选择支付方式';				
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
	
	//Asynchronous Ajax submission form
	var submitUrl = "/other/fee_submit";
	
	form.on('submit(feeSubmit)', function(data){
		
		
		$.ajax({
			type:"post",
			dataType:'json',
			url:submitUrl,
			data:data.field,
			//async:false, //同步
		});
		//layer.msg(JSON.stringify(data.field));
		
		//return false;				

	});//formSubmit end	  




$("ul.layui-tab-title li").click(function(){
	$("input[name='whosedata']").attr( "value" , $(this).attr("value")) ;		  

});	
  
 
});

function CheckPost(){
	var totalFee = $("input[name='total_fee']").val();
	
		//if(!totalFee.match(/^\+?[1-9][0-9]*$/)){  //请输入正整数  
		if(!totalFee.match(/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/)){
				alert('请输入正确金额');
				return false;
		}	
	
	
		

		if ($("input[name='whosedata']").val() == "") {
    			alert('请选择支付方式');	
				return false;			
   		}			
	
	
}
