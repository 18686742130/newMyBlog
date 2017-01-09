<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
  <meta charset=UTF-8">
  <title>测试文章2 -  Johnny的博客 - SYSIT个人博客</title>
    <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}
	  a{
		  text-decoration: none;
	  }
  </style>
</head>
<body>
	<?php include 'header.php' ?>
		<div id="OSC_Content"><div class="SpaceChannel">
		<div id="portrait"><a href="user/adminindex"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
		<div id="lnks">
			<strong>我的博客</strong>
			<div>
				<a href="user/index">首页</a>&nbsp;
	</span>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="Blog">
	  <div class="BlogTitle">
		<h1><?php echo $blog[0]->title ?></h1>
		<div class="BlogStat">
							<span class="admin">
			<span id="attention_it">
						<a href="#">收藏此文章</a>
					</span>
			</span>
					发表于<?php echo $blog[0]->create_time ?> ,
			已有<strong>1</strong>次阅读
			共<strong><a href="#comments">0</a></strong>个评论
			<strong>1</strong>人收藏此文章
		</div>
	  </div>
	  <div class="BlogContent TextContent"><?php echo $blog[0]->content ?></div>
		  <div class="BlogLinks">
		<ul>
			  <li>上篇 <span>(
					  <?php
					  function time2Units ($time)
					  {
						  $year   = floor($time / 60 / 60 / 24 / 365);
						  $time  -= $year * 60 * 60 * 24 * 365;
						  $month  = floor($time / 60 / 60 / 24 / 30);
						  $time  -= $month * 60 * 60 * 24 * 30;
						  $week   = floor($time / 60 / 60 / 24 / 7);
						  $time  -= $week * 60 * 60 * 24 * 7;
						  $day    = floor($time / 60 / 60 / 24);
						  $time  -= $day * 60 * 60 * 24;
						  $hour   = floor($time / 60 / 60);
						  $time  -= $hour * 60 * 60;
						  $minute = floor($time / 60);
						  $time  -= $minute * 60;
						  $second = $time;
						  $elapse = '';

						  $unitArr = array('年'  =>'year', '个月'=>'month',  '周'=>'week', '天'=>'day',
							  '小时'=>'hour', '分钟'=>'minute', '秒'=>'second'
						  );

						  foreach ( $unitArr as $cn => $u )
						  {
							  if ( $$u > 0 )
							  {
								  $elapse = $$u . $cn;
								  break;
							  }
						  }

						  return $elapse;
					  }
					  date_default_timezone_set('Asia/Shanghai');
					  $now = time();
					  foreach($blogs as $key=>$row){
						  if($row->title==$blog[0]->title){
							  if($key==0){
								  $diff = $now - strtotime($blogs[$key]->create_time);
								  echo '发表于' . time2Units($diff) . '前' ;
							  }else{
								  $diff = $now - strtotime($blogs[$key-1]->create_time);
//								  echo $diff;
								  echo '发表于' . time2Units($diff) . '前' ;
							  }
						  }
					  }
					  ?>
					  )</span>：<a href="user/viewBlog?id=<?php
				  foreach($blogs as $key=>$row){
					  if($row->title==$blog[0]->title){
						  if($key==0){
							  echo $blogs[$key]->blog_id;
						  }else{
							  echo $blogs[$key-1]->blog_id;
						  }
					  }
				  }
				  ?>" class="prev">
					  <?php
					  	foreach($blogs as $key=>$row){
							if($row->title==$blog[0]->title){
								if($key==0){
									echo $blogs[$key]->title;
								}else{
									echo $blogs[$key-1]->title;
								}
							}
						}
					  ?>
				  </a></li>            	</ul>
	  </div>
		<div class="BlogComments">
		<h2>共有 <?php echo $blog[0]->comm_id?count($blog):'0' ?> 条网友评论</h2>
			<ul id="BlogComments">
				<?php
					if($blog[0]->comm_id){
				 		for($i=0;$i<count($blog);$i++){
					?>
				<li>
					<div class='portrait'>
						<a href="#"><img src="images/portrait.gif" align="absmiddle" class="SmallPortrait"/></a>
					</div>
					<div class='body'>
						<div class='title'>
							<?php echo $blog[$i]->username ?> 发表于 <?php echo $blog[$i]->comm_time ?></div>
						<div class='post'><p><?php echo $blog[$i]->commcon ?></p></div>
						<div  class='inline_reply'></div>
					</div>
					<div class='clear'></div>
				</li>
					 <?php
				 	}
				 }else{
						?>
					<p>尚无评论</p>
				<?php
					}
				   ?>
			</ul>
			  </div>
	  <div class="CommentForm">
		<a name="postform"></a>
		<form id="form_comment" action="user/newcom" method="POST">
			<input type="hidden" name="zuozhe" value=<?php echo $blog[0]->user_id ?>>
			<input type="hidden" name="blogid" value=<?php echo $blog[0]->blog_id ?>>
		  <textarea id="ta_post_content" name="content" style="width: 450px; height: 100px;"></textarea><br>
		  <input value="发表评论" id="btn_comment" class="SUBMIT" type="submit">
		  <img id="submiting" style="display: none;" src="images/loading.gif" align="absmiddle">
		  <span id="cmt_tip">文明上网，理性发言</span>
		</form>
		<a href="user/#" class="more">回到顶部</a>
		<a href="user/blogComments" class="more">回到评论列表</a>
	  </div>
	  </div>
	<div class="BlogMenu"><div class="RecentBlogs SpaceModule">
		<strong>最新博文</strong><ul>
				<?php
					$a=0;
					for($i=count($blogs)-1;$i>=0;$i--){
						$a++;
						if($a==6){
							break;
						}
						?>
						<li><a href="user/viewBlog?id=<?php echo $blogs[$i]->blog_id ?>"><?php echo $blogs[$i]->title; ?></a></li>
						<?php
					}
				?>
				<li class="more"><a href="user/index">查看所有博文»</a></li>
		</ul>
	</div>
	<div class="RelatedBlogs SpaceModule">
	<strong>相关博文</strong>
	<ul>

	</div>
	</div>
	<div class="clear"></div>

		<div class="clear"></div>
		<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
	</div>
</body>
</html>