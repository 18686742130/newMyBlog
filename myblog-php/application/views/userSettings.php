<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
  <meta charset=UTF-8">
  <title>Johnny的博客 - SYSIT个人博客</title>
      <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
		<div id="AdminContent"><div class="MainForm">
	<form id="style_form" action="user/userSet" method="POST">
	<h2 class="title">网页个性化设置</h2>
	<table>
		<tbody>
			<tr>
			<th>我的心情</th>
			<td><input name="smile" size="40" maxlength="40" class="TEXT" value="今天心情很好！" type="text"></td>
		</tr>
		<tr><th></th><td></td></tr>
		<tr class="submit">
			<th></th>
			<td>
			<input value="保存修改" class="BUTTON SUBMIT" type="submit">
			<span id="error_msg" style="display:none"></span>
			</td>
		</tr>
	</tbody></table>
	</form>
	</div>
	</div>
		<div class="clear"></div>
	</div>
	</div>
		<div class="clear"></div>
		<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
	</div>
</body>
</html>