$(function(){
	
	var province = threeSelectData;
	var sump = '';
	$.each(province, function(p){	
		sump += '<option value="'+p+'">'+p+'</option>';		
	})
	$(sump).appendTo("#province");						

	function showcity(){
		var sumc = '<option value="请选择市">请选择市</option>';
		
		var city = threeSelectData[$("#province option:selected").val()].items;			
		for (var c in city) {
			sumc += '<option value="'+c+'">'+c+'</option>';		
		}	
		$("#city").empty().append(sumc);
		$("#area").empty().append('<option value="请选择区/县">请选择区/县</option>');


	}

	function showarea(){	
		var suma='<option value="请选择区/县">请选择区/县</option>';
		
		var area = threeSelectData[$("#province option:selected").val()].items[$("#city option:selected").val()].items;
		for (var a in area) {
			suma += '<option value="'+a+'">'+a+'</option>';		
		}
		$("#area").empty().append(suma);	
	}

	function init(){
		document.getElementById("province").onchange = showcity ;	
		document.getElementById("city").onchange = showarea ;		
	}

	init();	

});	
