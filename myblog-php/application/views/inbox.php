<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
  <meta charset=UTF-8">
  <title>我的留言箱 Johnny的博客 - SYSIT个人博客</title>
      <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
	</div>
	<div id="AdminContent">
		<div class="MsgList">
			<ul style="float: left;">
				<?php
					for($i=count($ly)-1;$i>=0;$i--){
				?>
						<li id="msg_186720">
							<span class="sender"><a href="user/#"><img src="images/12_50.jpg"  title="红薯" class="SmallPortrait" user="12" align="absmiddle"></a></span>
								<span class="msg">
								<div class="outline">
									<a href="user/#" target="user"><?php echo $ly[$i]->username ?></a>
									发送于 <?php echo $ly[$i]->time ?>
									&nbsp;&nbsp;<span style="color:#000;cursor: pointer;" class="delete" data=<?php echo $ly[$i]->ly_id ?>>删除</span>
								</div>
								<div class="content">
									<div class="c"><?php echo $ly[$i]->content ?></div>
									<div class="c" style="color:blue;border-color:#00B7FF;<?php echo $ly[$i]->huifu?'':'display:none' ?>"><?php echo $ly[$i]->huifu ?></div>
								</div>
								<textarea name="" id=<?php echo $ly[$i]->ly_id ?> cols="77" rows="5" style="display: none;"></textarea>
								<div class="opts">
									<span class="haha" style="cursor:pointer;<?php echo $ly[$i]->huifu?'display:none':'' ?>" title="点击回复留言" da=<?php echo $ly[$i]->ly_id ?>>回复留言</span>
								</div>
								</span>
								<div class="clear"></div>
						</li>
				<?php
				}
				?>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
	</div>
	<script src="javascript/jquery-1.12.4.js"></script>
	<script>
		$(function(){
			var bflag = true;
			$(".haha").on("click",function(){
				var id = $(this).attr("da");
				var that=this;
				if(bflag){
					bflag=false;
					$("#"+id).show();
					$(this).text("确定回复");
				}else{
					bflag=true;
					var content = "您的回复:"+$("#"+id).val();
					$.get("user/huifu",{ly:content,id:id},function(data){
						if(data=="success"){
							alert("回复成功");
							window.location="user/inbox";
						}else{
							$(that).text("回复留言");
							$("#"+id).hide().val("");
							alert("回复失败，请重试!")
						}
					},"text");
				}
			});
			$(".delete").on("click",function(){
				var id = $(this).attr("data");
				var that=this;
				$.get("user/deletely",{id:id},function(data){
					if(data=="success"){
						$(that).parents("li").remove();
						alert("删除成功!");
					}else{
						alert("删除失败，请重试");
					}
				},"text");
			});
		});
	</script>
</body>
</html>