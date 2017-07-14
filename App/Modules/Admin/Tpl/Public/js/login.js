$(function(){
	
	$('#switch_qlogin').click(function(){
		$('#switch_login').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_qlogin').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_bottom').animate({left:'0px',width:'70px'});
		$('#qlogin').css('display','none');
		$('#web_qr_login').css('display','block');
		
		});
	$('#switch_login').click(function(){
		
		$('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_bottom').animate({left:'154px',width:'70px'});
		
		$('#qlogin').css('display','block');
		$('#web_qr_login').css('display','none');
	});
	//登录提交
	$("#login_form").submit(function(){
		if($("#u").val()==""){
			$("#u").get(0).focus();
			return false;
		}else if($("#p").val()==""){
			$("#p").get(0).focus();
			return false;
		}
	})
	//注册提交
	$("#regUser").submit(function(){
		if($("#user").val()==""){
			$("#user").get(0).focus();
			return false;
		}else if($("#passwd").val()==""){
			$("#passwd").get(0).focus();
			return false;
		}else if($("#passwd2").val()==""){
			$("#passwd2").get(0).focus();
			return false;
		}else if($("#passwd2").val()!=$("#passwd").val()){
			$("#passwd2").get(0).focus();
			return false;
		}else if($("#verify").val()==""){
			$("#verify").get(0).focus();
			return false;
		}
	})

});