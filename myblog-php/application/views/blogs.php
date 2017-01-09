<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
	  <meta charset=UTF-8">
	  <title>博客文章管理 Johnny的博客 - SYSIT个人博客</title>
	  <link rel="stylesheet" href="css/space2011.css" >
	  <style type="text/css">
		body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}
		  span{
			  cursor: pointer;
			  color: red;
		  }
	  </style>
</head>
<body>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
	<div id="AdminContent">
	<div class="MainForm BlogArticleManage">
	  <h3 class="title">共有 <span><?php echo count($blogs); ?></span> 篇博客，每页显示 40 个，共 1 页</h3>
		<div id="BlogOpts">
		<span id="selectAll" >全选</span>&nbsp;|
		<span id="concer">取消</span>&nbsp;|
		<span id="resSelect">反向选择</span>&nbsp;|
		<span id="delete">删除选中</span>
	  	</div>
		<ul>
			<?php
				for($i=0;$i<count($blogs);$i++){
					$blog = $blogs[$i];
					?>
						<li class="row_1">
								<input  name="blog" value="<?php echo $blog->blog_id ?>" type="checkbox">
								<a href="user/viewBlog?id=<?php echo $blog->blog_id ?>" ><?php echo $blog->title ?></a>
								<small><?php echo $blog->create_time ?></small>
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
		$("#selectAll").on("click",function(){
			$(":checkbox").prop('checked',true);
		});
		$("#concer").on("click",function(){
			$(":checked").prop('checked',false);
		});
		$("#resSelect").on("click",function(){
			$(":checkbox").each(function(){
				this.checked = !this.checked;
			});
		});
		$("#delete").on("click",function(){
			var str = "";
			$(":checked").each(function(){
				str += this.value + ",";
			});
			str = str.slice(0,-1);
			$.get("user/deleteBlogs",{blogID:str},function(data){
				if(data == "success"){
					$(":checked").parent().remove();
					$(".title span").text($(".row_1").size());
					alert("删除成功");
				}else if(data =="file"){
					alert("删除失败，请刷新后重试");
				}
			},"text");
		});
	</script>
</body>
</html>