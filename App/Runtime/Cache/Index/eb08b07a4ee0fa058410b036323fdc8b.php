<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset='utf-8'/>
	<title>UniCourse-找回密码</title>
    <style>
    	button{display:block;width:260px;height:40px;line-height:40px;background-color:rgb(35,45,59);color:#fff;border:none;margin:15px auto 0px auto;box-shadow:0px 2px 1px rgba(51,153,153,1);cursor:pointer;}
    	button:hover{background-color: rgb(45,55,69)}
    	input{width:240px;height:30px;padding:5px 10px;border:none;border-radius:1px;box-shadow:0px 2px 1px rgba(0,0,0,0.3);}
    	body{background-color:#17A2CF;margin: 0;padding:0;font-family: '微软雅黑','Helvetica','Helvetica neue','Microsoft YaHei','黑体'}
    	.container{position: absolute;width:100%;height:100%;text-align: center;}
    	#main{position: absolute;top:50%;left:50%;width:280px;height:300px;overflow: visible;margin-left: -140px;margin-top: -150px}
    	#mail{display: block;position: absolute;top:50%;left:50%;width:400px;height:150px;margin-top: -75px;margin-left: -200px}
    </style>
</head>
<body>
	<div class="container">
		<div id="main" >
			<div style="margin-bottom:20px">
				<img src="__PUBLIC__/images/index/man.png" style="height: 65px; display: inline-block;vertical-align:bottom"/>
				<div style="font-size: 34px; color: rgb(255, 255, 255);display:inline-block;margin:10px;vertical-align:bottom">重置密码</div>
			</div>
			<form id="form">
				<input type="text" name="usernumber" id="usernumber" placeholder="请输入您的学/工号" autofocus required/>
				<button id="submit"><span class="toggle">提交</span><span class="toggle" style="display:none;">处理中……</span></button>
			</form>
			<div style="margin: 10px; color: rgb(255, 255, 155);width:280px;text-align:left">
				说明：<br/>
				我们将给您的RUC邮箱发送一封邮件<br/>点击邮件链接完成密码的重置
			</div>
		</div>
		<div id="mail" style="background-color: #1A518A; display: none;">
			<div style="margin-top:40px">
				<img src="__PUBLIC__/images/index/mail.png" style="height:65px;display:inline-block;vertical-align:middle"/>
				<div style="display:inline-block;vertical-align:middle;margin-left:20px;text-align:left">
					<span style="font-weight:bold;color:rgb(155,255,155)">邮件已成功发送</span><br/>
					<a href="http://mail.ruc.edu.cn" style="color:#FFF;text-decoration:none;">点此查看</a>
				</div>
			</div>
		</div>
	</div>
	<script src="__PUBLIC__/js/jquery-1.10.2.js"></script>
	<script src="__PUBLIC__/js/jquery.cookie.js"></script>
	<script>
		$(document).ready(function() {
			flag=0;
			$("#form").on('submit',function(event) {
				if(flag==1) return false;
				var uno=$("#usernumber").val();
				if(!uno) return false;
				flag=1;
				$(".toggle").toggle();
				$.post("<?php echo U('Index/Rgst/forgetpasswd');?>",{uno:uno},function(data,status){
					if(data.status==0){
						$("#main").hide();
						$("#mail").show();
					}
					else{
						alert(data.info);
					}
					flag=0;
					$(".toggle").toggle();
				});
				return false;
			});
		});
	</script>
</body>
</html>