<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="<?php echo site_url(); ?>">
</head>
<body>
    <form action="user/setly" method="post">
        <textarea name="ly" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="发送留言">&nbsp;| <button id="return"><a style="text-decoration: none;color: #000;" href="user/index">返回</a></button>
    </form>
</body>
</html>