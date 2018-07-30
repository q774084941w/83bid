$().ready(function() {
//表单验证
 $("#signupForm").validate({
 
 //验证规则
   rules: {
   uname:{ 
   required: true,
   username:true,
   unameajax:true
   },
   email: {
    required: true,
    email: true
   },
   pwd: {
    required: true,
    pwd: true
   },
   repwd: {
    required: true,
    equalTo: "#pwd"
   },
   identity:{
	required: true
   }
  },
  //验证失败输出的信息。
 messages: {
   uname:{ 
	required:"请输入用户名",
	unameajax:"231231",
	username:"以字母开头，允许5-16字节，允许字母数字下划线",
	//unameajax:"用户名已经存，请更换用户名"
	},
   email: {
    required: "请输入Email地址",
    email: "请输入正确的email地址"
   },
   pwd: {
    required: "请输入密码",
    pwd:"以字母开头，长度在6~18之间，只能包含字母、数字和下划线"
   },
   repwd: {
    required: "请输入确认密码",
    equalTo: "两次输入密码不一致"
   },
   identity:{
	required: "请选择身份"
   }
  },
  //错误提示消息显示位置
	errorPlacement: function (error, element) { 
        var icon = $(element).parent('.input-icon').children('i');
        icon.removeClass('fa-check').addClass("fa-warning");  
        icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
	},
	
   invalidHandler: function (event, validator) { 
		success.hide();
		error.show();
        App.scrollTo(error, -200);
		return false;
    },
	highlight: function (element) { // 验证失败时给输入框红色高亮
        $(element)
		.closest('.input-group').removeClass('has-success').addClass('has-error'); 
		$("#signupForm")
		return false;
      },
	  //验证成功之后给绿色高亮
	success: function (label, element) {
        var icon = $(element).parent('.input-icon').children('i');
		$(element).closest('.input-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
        icon.removeClass("fa-warning").addClass("fa-check");
        },
		
	submitHandler: function (element) {
        success.show();
		error.hide();
					
    }
  
    });
});


//自定义uname输入规则验证规则
jQuery.validator.addMethod("username", function(value, element, param) {
	var ok = this.optional(element)|| /^[a-zA-Z][a-zA-Z0-9_]{4,15}$/i.test(value);
	$("#ajaxerr")
		.css("display","none");
		$("#ajaxssu")
		.css("display","none");
        return ok;
}, "uname.");


//自定义uname后台 Ajax验证
jQuery.validator.addMethod("unameajax", function(value, element) {    
      var flag = 1;  
	  //Ajax验证用户名部分
		$.ajax({
    	   	type: "get",
			url: "ajaxReg?uname="+$("#uname").val(),
			success: function(msg){
				if(msg=='UsernameFalse')
			    {
					var icon = $("#uname").parent('.input-icon').children('i');
					icon.removeClass('fa-check').addClass("fa-warning");  
					icon.attr("data-original-title", "用户名已存在，请更换用户名").tooltip({'container': 'body'});
					$("#uname")
					.closest('.input-group').removeClass('has-success').addClass('has-error'); 		
			    }
			}
		});
  
    if(flag == 0){  
       return false;  
    }else{  
       return true;  
    }  
  
  }, "用户名已经存，请更换用户名");  


//自定义pwd密码验证规则
jQuery.validator.addMethod("pwd", function(value, element, param) {
	return this.optional(element) || /^[a-zA-Z]\w{5,17}$/i.test(value);
}, "pwd.");

// 提交数据前验证
// 各输入框是否为空，是否接收协议 $('input[name="allow"]:checked').val()
$("#sub").bind("click",function(event){

// 取得需要检测对象的值	
	var stru  = $("#uname").val();
	var strp  = $("#pwd").val();
	var strcp = $("#repwd").val(); 
	var stre  = $("#email").val();
	var warn  = $("#warn").val();

// 判断不提交条件
// 所有文本框不能为空、复选框必须被选中
	if(stru && strp && strcp && stre){

	}else{
				$("#warn")
				.css("display","block");
		   		return false;
		   	};

		});
