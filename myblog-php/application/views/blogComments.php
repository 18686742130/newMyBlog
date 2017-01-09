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
    <div id="AdminContent">
	<div class="MainForm BlogCommentManage">
  	<h3>共有 <?php echo count($com) ?> 篇博客评论，每页显示 20 个，共 <?php echo ceil(count($com)/20) ?> 页</h3>
  	<ul>
		<?php

		for($i=count($com)-1;$i>=0;$i--){
			?>
		<li id=<?php echo $com[$i]->comm_id ?> class=<?php echo $com[$i]->comm_user ?>>
			<span class="portrait"><a href="#" target="_blank"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
		<span class="comment">
		<div class="user"><b><?php echo $com[$i]->username ?></b> 评论了 <a href="user/viewBlog?id=<?php echo $com[$i]->blog_id ?>" target="_blank"><?php echo $com[$i]->title ?></a></div>
		<div class="content"><p><?php echo $com[$i]->commcon ?></p></div>
		<div class="opts">
			<span style="float:right;color:blue;cursor:pointer;">
			<span class="delete" update=<?php echo $com[$i]->comm_id ?>>删除</span> |
			<span class="deleteall" user_id=<?php echo $com[$i]->comm_user ?>>删除此人所有评论</span>
			</span>
			<?php echo $com[$i]->comm_time ?>
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
	</div>
	</div>
		<div class="clear"></div>
		<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
	</div>
	<script src="javascript/jquery-1.12.4.js"></script>
	<script>
		$(function(){
			$(".delete").on("click",function(){
				var id= $(this).attr("update");
				$.get("user/deleteCom",{id:id},function(data){
					if(data=="success"){
						$("#"+id).remove();
						alert("删除成功");
					}else if(data=="file"){
						alert("删除失败，请重试");
					}
				},"text")
			});
			$(".deleteall").on("click",function(){
				var id = $(this).attr("user_id");
				$.get("user/deleteall",{id:id},function(data){
					if(data=="success"){
						$("."+id).remove();
						alert("删除成功!");
					}else if(data=="file"){
						alert("删除失败，请重试!");
					}
				},"text")
			});
		});
	</script>
</body>
</html>