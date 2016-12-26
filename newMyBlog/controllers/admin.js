var admin = require("../models/adminModel");
//admin跳转
//管理首页
exports.index = function(req,res){
    res.render("adminindex",{user: req.session.loginUser});
};
//站内留言页面
exports.inbox = function(req,res){
  res.render("inbox",{user: req.session.loginUser});
};
//编辑个人资料
exports.profile = function(req,res){
  res.render("profile",{user: req.session.loginUser});
};
//修改密码页面
exports.chpwd = function(req,res){
  res.render("chpwd",{user: req.session.loginUser});
};
//网页个性设置
exports.userSetting = function(req,res){
  res.render("userSettings",{user: req.session.loginUser});
};
//更改心情
exports.userSet = function(req,res){
  var smile = req.body.smile;
  var user = req.session.loginUser.user_id;
  var param = [smile,user];
  admin.querySmile(param,function(result){
      admin.queryUser([user],function(rt){
        req.session.loginUser = rt[0];
        res.redirect("/adminindex");
      });
  });
};
//文章详情页面
exports.viewBlog = function(req,res){
  var blogID = req.query.id;
  admin.viewBlog([blogID],function(result){
    if(result.length>0){
      res.render("viewBlog",{user: req.session.loginUser,vBlog:result})
    }else{
      res.send("file");
    }
  });
};
//新建文章页面
exports.newBlog = function(req,res){
  var param = [req.session.loginUser.user_id,req.session.loginUser.user_id];
  admin.queryType(param,function(result){
    res.render("newBlog",{user: req.session.loginUser,type:result});
  });
};
//文章管理页面
exports.blogs = function(req,res){
  var param = [req.session.loginUser.user_id];
  admin.queryBlogs(param,function(result){
    res.render("blogs",{user: req.session.loginUser,blogs:result});
  });
};
//评论管理页面
exports.blogComments = function(req,res){
  var param = [req.session.loginUser.user_id];
  admin.queryComm(param,function(result){
    res.render("blogComments",{user: req.session.loginUser,comm:result});
  });
};
//类型管理页面
exports.blogType = function(req,res){
  var param = [req.session.loginUser.user_id,req.session.loginUser.user_id];
  admin.queryType(param,function(result){
      res.render("blogType",{user: req.session.loginUser,type:result});
    });
};
//修改文章类型
//添加
exports.addType = function(req,res){
  var type = req.body.name;
  var user = req.session.loginUser.user_id;
  var param = [type,user];
  admin.addType(param,function(result){
    if(result.affectedRows>0){
      res.redirect("/blogType");
    }else{
      res.redirect("/blogType");
    }
  });
};
//删除
exports.deleteType = function(req,res){
  var typeID = req.query.typeID;
  var param = [typeID]
  admin.deleteType(param,function(result){
    if(result.affectedRows>0){
      res.send("success");
    }else{
      res.send("file");
    }
  })
};
//修改
exports.chtype = function(req,res){
  res.render("chtype",{user: req.session.loginUser});
};
//原有方法太蠢，感觉难看，准备写一个弹出层，先空着
//发表文章
exports.createBlog = function(req,res){
  var title = req.body.title;
  var content = req.body.content;
  var user = req.session.loginUser.user_id;
  var typeID = req.body.typeID;
  var param = [title,content,user,typeID];
  admin.addBlog(param,function(result){
    if(result.affectedRows>0){
      res.redirect("/blogs");
    }else{
      res.redirect("/newBlog");
    }
  });
};
//删除文章
exports.deleteBlogs = function(req,res){
  var blogsID = req.query.blogsID;
  admin.deleteBlogs(blogsID,function(result){
    if(result.affectedRows>0){
      res.send("success");
    }else{
      res.send("file");
    }
  });
};
//修改密码
exports.changePWD = function(req,res){
  var oldpwd = req.query.oldpwd;
  var newpwd = req.query.newpwd;
  var user = req.session.loginUser.user_id;
  var param = [newpwd,user,oldpwd];
  admin.changePWD(param,function(result){
    if(result.affectedRows>0){
      res.send("success");
      req.session.loginUser =null ;
    }else{
      res.send("file");
    }
  });
};
//评论管理
