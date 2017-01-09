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
                <a href="user/index">首页</a>&nbsp;|
                <a href="user/inbox">发送留言</a>
                </span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="Blog">
        <div class="BlogTitle">
            <form action="user/updatebbb" method="post">
                <input type="hidden" name="id" value=<?php echo $blog[0]->blog_id ?>>
            <input type="text" name="title" style="width:98%;height: 30px;" value=<?php echo $blog[0]->title ?>>
            <div class="BlogStat">
							<span class="admin">
			<span id="attention_it">
					</span>
			</span>
            </div>
        </div>
        <div class="BlogContent TextContent">
            <textarea name="" id="" cols="94.5" rows="20"><?php echo $blog[0]->content ?></textarea>
        </div>
            <input type="submit" style="margin: 10px" value="保存修改">
            <button id="btn">撤销并返回</button>
        </form>
        <div id="form_comment"></div>
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