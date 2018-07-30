
$().ready(function() {
	$("#verifywarn")
	.css("display","none");
	$("#loginform").validate({
		rules: {
			verify:{
				verifyajax: true,
				required:true
			}

		},
		messages: {
			verify:{
				required:""
			}
		}
	});

});


//自定义验证码后台 Ajax验证
jQuery.validator.addMethod("verifyajax", function(value, element) {    
      var flag = 1;  
	  //Ajax验证验证码部分
		$.ajax({
    	   	type: "get",
			url: " ajaxLog?verify="+$("#verify").val(),
            datatype:"json",
			success: function(msg){
				if(msg=='verifyFalse')
			    { 
					$("#verify")
					.closest('.input-group').removeClass('has-success').addClass('has-error');
					$("#verifywarn")
					.css("display","block");
			    }else{
					$("#verify")
					.closest('.input-group').removeClass('has-error').addClass('has-success');
					$("#verifywarn")
					.css("display","none");
				}
			}
		});
  
    if(flag == 0){  
       return false;  
    }else{  
       return true;  
    }  
  
  }, "1231");  

 $("#sub1").bind("click",function(event){

// 取得需要检测对象的值	
	var stru1  = $("#uname").val();
	var strp1  = $("#pwd").val();
	var warn1  = $("#verify").val();

// 判断不提交条件
// 所有文本框不能为空、复选框必须被选中

	if(stru1 && strp1 && warn1){

	}else{
 		return false;
	};

	});
