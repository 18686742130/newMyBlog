<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
  <meta charset=UTF-8">
  <title>申请账号 - SYSIT个人博客</title>
	<link rel="stylesheet" href="css/oschina2011.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/osc-popup.css" type="text/css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,Simsun,sans-serif;}  
  </style>
</head>
<body>
<div id="OSC_Screen">
<div id="OSC_Content" class="CenterDiv"><style>
#OSC_Footer {border:0;}
.MainForm tr.hl th {border:1px solid #C00;border-right:0;background:#FEE;}
.MainForm tr.hl td {border:1px solid #C00;border-left:0;background:#FEE;}
.MainForm td .nodisp {display:none;padding-left:20px;}
.MainForm tr.hl td .nodisp {display:inline;color:#C00;font-size:11pt;}
#OSChinaLoginTip {font-size:10.5pt;padding:0 0 20px 10px;color:#060;}
#OSChinaLoginTip ul {margin:10px 0 0 0;}
#OSChinaLoginTip ul li {float:left; width:90px;margin-right:30px;}
#OSChinaLoginTip ul li#openid_gmail img {margin-top:8px;}
#OSChinaLoginTip ul li#openid_yahoo img {margin-top:15px;}
#OSChinaLoginTip ul li#openid_msn img {}
#OSChinaLoginTip ul li a {display:block;height:40px;}
#OSChinaLoginTip ul li a {border:1px solid #fff;padding:2px;}
#OSChinaLoginTip ul li a:hover {border:1px solid #40AA53;background:#cfc;}
</style>

<div class="MainForm" id="reg_page">
<form id="frm_reg" action="user/addUser" method="POST" style="float:left; width:620px;">
    <h2>申请<span style="color: #006600;"> SYSIT Blog</span> 账号，已经申请的请点击<a href="user/login">这里</a>登录</h2>
    <div id="error_msg" class="error_msg" style="display:none"></div>
	<table cellpadding="0" cellspacing="0">
    	<tbody>
    	<tr>
    		<th>姓名：</th>		
    		<td><input name="name" id="uname" maxlength="20" class="TEXT" style="width: 150px;" type="text">
				<span id="unameSpan">不能超过5个字</span>
			</td>
    	</tr>
    	<tr>
    		<th>登录密码：</th>
    		<td><input name="pwd" id="pwd" class="TEXT" style="width: 150px;" type="password">
				<span id="pwdSpan">至少四位</span>
			</td>    		
    	</tr>
    	<tr>
    		<th>密码确认：</th>		
    		<td><input name="pwd2" id="pwd2" class="TEXT" style="width: 150px;" type="password"></td>
    	</tr>
		<tr id="tr_email">
			<th nowrap="nowrap">电子邮箱：</th>
			<td>
				<input name="email" id="email" class="TEXT" style="width: 200px;" type="text">
				<span id="emailSpan" ></span>
			</td>
		</tr>
    	<tr id="tr_gender">
        	<th>性别：</th>		
    		<td>
				<input name="gender" value="1" id="gender_1" type="radio"><label for="gender_1">男</label>&nbsp;&nbsp;&nbsp;
				<input name="gender" value="2" id="gender_2" type="radio"><label for="gender_2">女</label>
				<span class="nodisp">请选择性别</span>
			</td>	
        </tr>
    	<tr id="tr_area">
    		<th>居住地区：</th>		
    		<td><select onchange="showcity(this.value, document.getElementById('userCity'));" name="province" id="userProvince">
				<option selected="selected" value="">--请选择省份--</option>
				<option value="北京">北京</option>
				<option value="上海">上海</option>
				<option value="广东">广东</option>
				<option value="江苏">江苏</option>
				<option value="浙江">浙江</option>
				<option value="重庆">重庆</option>
				<option value="安徽">安徽</option>
				<option value="福建">福建</option>
				<option value="甘肃">甘肃</option>
				<option value="广西">广西</option>
				<option value="贵州">贵州</option>
				<option value="海南">海南</option>
				<option value="河北">河北</option>
				<option value="黑龙江">黑龙江</option>
				<option value="河南">河南</option>
				<option value="湖北">湖北</option>
				<option value="湖南">湖南</option>
				<option value="江西">江西</option>
				<option value="吉林">吉林</option>
				<option value="辽宁">辽宁</option>
				<option value="内蒙古">内蒙古</option>
				<option value="宁夏">宁夏</option>
				<option value="青海">青海</option>
				<option value="山东">山东</option>
				<option value="山西">山西</option>
				<option value="陕西">陕西</option>
				<option value="四川">四川</option>
				<option value="天津">天津</option>
				<option value="新疆">新疆</option>
				<option value="西藏">西藏</option>
				<option value="云南">云南</option>
				<option value="香港">香港特别行政区</option>
				<option value="澳门">澳门特别行政区</option>
				<option value="台湾">台湾</option>
				<option value="海外">海外</option>
			</select>
<select name="city" id="userCity"></select>
<span class="nodisp">请选择您所在的地区</span></td>
    	</tr>
    	<tr>
    		<th>验证码：</th>		
    		<td><input id="f_vcode" name="verifyCode" size="6" class="TEXT" type="text">
			<span><a href="javascript:_rvi()">换另外一个图</a></span>
			</td>
    	</tr>
		<tr>
    		<th>&nbsp;</th>		
			<td>
			<!--<img id="img_vcode" alt="..." src="images/captcha.png" style="border: 2px solid rgb(204, 204, 204);" align="absmiddle">-->
            <script language="javascript">function _rvi(){document.getElementById('img_vcode').src = '/action/user/captcha?t='+Math.random(1000);}</script>
			</td>
		</tr>
    	<tr class="buttons">
    		<th>&nbsp;</th>		
			<td style="padding: 20px 0pt;">
    		<input value=" 注册新用户 " class="BUTTON SUBMIT" id="submit" type="submit" >
			</td>
    	</tr>
	</tbody></table>
</form>
<div id="reg_tip" class="tipbox" style="float:right;width:300px;">
	<h3>为什么要注册？</h3>
	<ol>
		<li>发布博客</li>
		<li>参与博客的讨论和评论</li>
		<li>认识更多朋友</li>
	</ol>
	<h3 style="margin-top:20px;">为什么总提示验证码错误？</h3>
	<ol>
		<li>首先请确定浏览器已经启用Cookie</li>
		<li>实在不行，邮件给我们 admin@sysit.org</li>
	</ol>
</div>
<div class="clear"></div>
</div>
</div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script src="javascript/jquery-1.12.4.js"></script>
<script>
	$(function(){
		$("#uname").on("blur",function(){
			var name = this.value;
			if(name.length==0){
				$("#unameSpan").text('用户名 不能为空');
				no();
			}else if(name.length>10){
				$("#unameSpan").text('用户名 字数超过限制');
				no();
			}else{
				$.get("user/regUname",{name:name},function(data){
					if(data == 'file'){
						$("#unameSpan").text('该用户名已被注册');
						no();
					}else if(data == 'success'){
						$("#unameSpan").text('该用户名尚未注册');
						yes();
					}
				},"text")
			}
		});
		$("#pwd").on("blur",function(){
			if(this.value != $("#pwd2").val()||this.value.length < 4 ){
				no();
				$("#pwdSpan").text("两次密码输入不一致或长度小于4，请检查后重新输入");
			}else{
				yes();
				$("#pwdSpan").text("密码校验通过");
			}
		});
		$("#pwd2").on("blur",function(){
			if(this.value != $("#pwd").val() ||this.value.length < 4 ){
				no();
				$("#pwdSpan").text("两次密码输入不一致或长度小于4	，请检查后重新输入");
			}else{
				yes();
				$("#pwdSpan").text("密码校验通过");
			}
		});
		function no(){
			$('#submit').attr("disabled",true);
		}
		function yes(){
			$('#submit').attr("disabled",false);
		}
	});
</script>
</body>
</html>