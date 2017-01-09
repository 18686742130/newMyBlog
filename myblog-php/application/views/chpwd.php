<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
  <meta charset=UTF-8">
  <title>修改登录密码 Johnny的博客 - SYSIT个人博客</title>
      <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
    <div id="AdminContent">
	<div class="MainForm">
	<!--<form class="AutoCommitJSONForm" action="/changePWD" method="POST">-->
	<h2>修改我的登录密码</h2>
	<table width="100%">
		<tbody><tr>
			<th width="110">旧的登录密码</th>		
			<td>
				<input id="oldpwd" name="oldpwd" size="20" class="TEXT" tabindex="1" type="password">&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#" target="_blank">忘记登录密码</a>
			</td>    		
		</tr>
		<tr>
			<th>新密码</th>		
			<td><input id="newpwd" name="newpwd" size="20" class="TEXT" tabindex="2" type="password"></td>
		</tr>
		<tr>
			<th>再次输入新密码</th>		
			<td><input id="newpwd2" name="newpwd2" size="20" class="TEXT" tabindex="3" type="password"></td>
		</tr>
		<tr><th colspan="2"></th></tr>
		<tr class="submit">
			<th></th>
			<td>
			<button   id="submit"  >修改密码</button>
			<span id="error_msg" style="display:none"></span>
			</td>
		</tr>
	</tbody></table>
	<!--</form>-->
	</div></div>
		<div class="clear"></div>
	</div>
	</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
	</div>
	<script src="javascript/jquery-1.12.4.js"></script>
	<script>
		$(function(){
			$("#submit").on("click",function(){
				if($("#newpwd").val() != $("#newpwd2").val()){
					alert("两次新密码输入不一致，请检查后重新输入");
				}else{
					$.get("user/changePwd",{oldpwd:$("#oldpwd").val(),newpwd:$("#newpwd").val()},function(data){
						if(data == "success"){
							alert("修改成功，请重新登录");
							window.location='user/login';
						}else if(data == "file"){
							alert("修改失败，请重试");
						}else if(data=="file1"){
							alert("旧密码不正确");
						}
					},"text");
				}
			});
		});
	</script>
</body>
</html>