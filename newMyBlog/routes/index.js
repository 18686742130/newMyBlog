var express = require('express');
var router = express.Router();
var user = require('../controllers/user');
var admin = require("../controllers/admin");

//首页
router.get('/', user.index);

//登陆
router.get('/login',user.login);
router.post('/checkLogin',user.checkLogin);

//退出
router.get('/logout',user.logout);

//注册
router.get('/register',user.register);
router.post('/addUser',user.addUser);
//注册校验
router.get('/regEmail',user.regEmail);
router.get('/regUname',user.regUname);

//管理-跳转
router.get('/adminindex',admin.index);
router.get("/inbox",admin.inbox);
router.get("/profile",admin.profile);
router.get("/chpwd",admin.chpwd);
router.get("/userSettings",admin.userSetting);
router.get('/newBlog',admin.newBlog);
router.get('/blogs',admin.blogs);
router.get('/blogType',admin.blogType);
router.get("/blogComments",admin.blogComments);
router.get("/viewBlog",admin.viewBlog);

//更改心情
router.post("/userSet",admin.userSet);

//创建文章
router.post("/createBlog",admin.createBlog);

//删除文章
router.get("/deleteBlogs",admin.deleteBlogs);

//添加-删除 文章分类
router.post("/addType",admin.addType);
router.get("/deleteType",admin.deleteType);

//修改分类
router.get("/chtype",admin.chtype);

//修改密码
router.get("/changePWD",admin.changePWD);

module.exports = router;


