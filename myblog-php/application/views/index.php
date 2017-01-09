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
    a{
      text-decoration: none;
    }
  </style>
</head>
<body>
<div id="OSC_Screen">
    <?php include 'header.php' ?>
  <div id="OSC_Content"><div class="SpaceChannel">
      <div id="portrait"><a href="user/adminindex"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
      <div id="lnks">
        <strong>我的博客</strong>
        <div>
          <a href="user/adminindex" class="dianji">个人空间</a>&nbsp;|
          <a href="user/setmsg" class="dianji">发送留言</a>
          </span>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="BlogList">
      <ul>
        <?php
        if($blogs){
         for( $i=count($blogs)-1;$i>=0;$i--){
          ?>
        <li class='Blog'>
          <h2 class='BlogAccess_true BlogTop_0'><a href="user/viewBlog?id=<?php echo $blogs[$i]->blog_id ?>"><?php echo $blogs[$i]->title ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a style="font-size: 14px;color: #000;" href="user/updateblog?id=<?php echo $blogs[$i]->blog_id ?>">修改</a></h2>
          <div class='outline'>
            <span class='time'>发表于 <?php echo $blogs[$i]->create_time ?></span>
            <span class='catalog'>分类:
                <?php
                  if($blogs[$i]->type_name!=null){
                    echo $blogs[$i]->type_name;
                  }else{
                    echo "未分类";
                  }
                ?>
            </span>
            <span class='stat'>统计: <?php echo $blogs[$i]->num ?>评/0阅</span>
          </div>
          <div class='TextContent' >
            <?php echo $blogs[$i]->content ?>
            <div class='fullcontent'><a href="user/viewBlog?id=<?php echo $blogs[$i]->blog_id ?>">阅读全文...</a></div>
          </div>
        </li>
        <?php
            }
        }else{
          ?>
          <p style="margin-bottom: 60%" class="NoData">目前还没有任何文章</p>
        <?php
        }
           ?>
      </ul>
      <div class="clear"></div>
    </div>
    <div class="BlogMenu"><div class="catalogs SpaceModule">
        <strong>博客分类</strong>
        <ul class="LinkLine">
          <?php
          if($type){
            for($i=0;$i<count($type);$i++){
              ?>
              <li><?php echo $type[$i]->type_name."(".$type[$i]->num.")" ?></li>
              <?php
            }
          }else{
            ?>
            <p class="NoData">目前还没有任何分类</p>
            <?php
          }
          ?>
        </ul>
      </div>
      <div class="comments SpaceModule">
        <strong>最新网友评论</strong>
        <ul>
          <?php
          if(!$com==null) {
            for ($i = count($com) - 1; $i >= 0; $i--) {
              ?>
              <li id=<?php echo $com[$i]->comm_id ?> class=<?php echo $com[$i]->comm_user ?>>
                <span class="portrait"><a href="#" target="_blank"><img src="images/portrait.gif" alt="Johnny"
                                                                        title="Johnny" class="SmallPortrait"
                                                                        user="154693" align="absmiddle"></a></span>
		<span class="comment">
		<div class="user"><b><?php echo $com[$i]->username ?></b> 评论了 <a href="user/viewBlog?id=<?php echo $com[$i]->blog_id ?>"
                                                                         target="_blank"><?php echo $com[$i]->title ?></a>
        </div>
		<div class="content"><p><?php echo $com[$i]->commcon ?></p></div>
		<div class="opts">
          <span style="float:right;color:blue;cursor:pointer;"></span>
          <?php echo $com[$i]->comm_time ?>
        </div>
		</span>
                <div class="clear"></div>
              </li>
              <?php
            }
          }else{
            ?>
            <p class="NoData">目前还没有任何评论</p>
            <?php
          }
          ?>
        </ul>
      </div></div>
    <div class="clear"></div>
  <div class="clear"></div>
  <div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
  <script src="javascript/jquery-1.12.4.js"></script>
  <script>
    $(function(){
      $(".dianji").on("click",function(){
        var shenfen = $("#shenfen").text();
        if(shenfen=="游客"){
          alert("请登录后再使用本博客");
          return false;
        }
      });
    });
  </script>
</body>
</html>