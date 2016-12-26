var express = require('express');
var router = express.Router();
var user = require('../controllers/user');
var admin = require("../controllers/admin");

//��ҳ
router.get('/', user.index);

//��½
router.get('/login',user.login);
router.post('/checkLogin',user.checkLogin);

//�˳�
router.get('/logout',user.logout);

//ע��
router.get('/register',user.register);
router.post('/addUser',user.addUser);
//ע��У��
router.get('/regEmail',user.regEmail);
router.get('/regUname',user.regUname);

//����-��ת
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

//��������
router.post("/userSet",admin.userSet);

//��������
router.post("/createBlog",admin.createBlog);

//ɾ������
router.get("/deleteBlogs",admin.deleteBlogs);

//���-ɾ�� ���·���
router.post("/addType",admin.addType);
router.get("/deleteType",admin.deleteType);

//�޸ķ���
router.get("/chtype",admin.chtype);

//�޸�����
router.get("/changePWD",admin.changePWD);

module.exports = router;


