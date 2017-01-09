<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
  <meta charset=UTF-8">
  <title>博客设置/分类管理 Johnny的博客 - SYSIT个人博客</title>
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
	<div class="MainForm BlogCatalogManage">
	<form id="CatalogForm" action="user/addType" method="post">
		<h3> 添加博客分类 </h3>
		<div id="error_msg" class="error_msg" style="display:none;"></div>
		<label>分类名称:</label><input id="name" name="name" size="15" tabindex="1" type="text">
		<span class="submit">
			  <input value="添加&nbsp;»" tabindex="3" class="BUTTON SUBMIT" id = "addType" type="submit">
			</span>
	</form>
	<form class="BlogCatalogs">
	<h3>博客分类 </h3>
	<table cellpadding="1" cellspacing="1">
		<tbody><tr>
			<th>序号</th>
			<th>分类名</th>
			<th>文章</th>
			<th>操作</th>
		</tr>
		<?php
		 for($i=0;$i<count($type);$i++){
			 ?>
		<tr id="catalog_92334">
			<td class="idx"><?php echo $i+1 ?></td>
			<td class="name">
				<span class=<?php echo $type[$i]->type_id ?>><?php echo $type[$i]->type_name ?></span>
				<input type="text" style="display:none" id=<?php echo $type[$i]->type_id ?>>
			</td>
			<td class="num"><?php echo $type[$i]->num ?></td>
			<td class="opts">
				<span style="cursor:pointer;color:blue" class="update" data=<?php echo $type[$i]->type_id ?> title="点击修改博客分类">修改</span>
				<span style="cursor:pointer;color:blue" class="delete"  value=<?php echo $type[$i]->type_id ?> >删除</span>
			</td>
		</tr>
			 <?php
		 }
		  ?>
		</tbody>
		</table>
		</form>
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
			$("#addType").on("click",function(){
				var $name = $("#name").val();
				for(var i=0;i<$(".name").size();i++){
					if($(".name").eq(i).text()==$name){
						alert("此类别已存在!");
						return false;
					}
				}
			});
			$(".delete").on("click",function(){
				var typeID = $(this).attr("value");
				var that = this;
				$.get("user/deleteType",{typeID:typeID},function(data){
					if(data=="success"){
						$(that).parents("tr").remove();
						alert("删除成功");
					}else if(data=="file"){
						alert("删除失败");
					}
				},"text");
			});
			var bflag=true;
			$(".update").on("click",function(){
				var  str = $(this).attr("data");
				if(bflag){
					bflag=false;
					var value = $("."+str).text();
					$("#"+str).show().val(value);
					$("."+str).hide();
					$(this).text("确定");
				}else{
					bflag=true;
					var value = $("#"+str).val();
					$("."+str).show();
					$("#"+str).hide();
					$(this).text("修改");
					$.get("user/updateType",{name:value,typeID:str},function(data){
						if(data=="success"){
							$("."+str).text(value);
							alert("修改成功");
						}else if(data=="file"){
							alert("修改失败，请重试");
						}
					},"text");
				}
			});
		});
	</script>
</body>
</html>



