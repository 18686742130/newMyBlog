var userModel = require('../models/userModel');

exports.index = function(req,res){
    var param = [ req.session.loginUser.user_id];
    userModel.queryBlogSomething(param,function(result){
        res.render('index',{user: req.session.loginUser,blogS:result})
    });
};
//退出
exports.logout = function(req,res){
    req.session.loginUser = null;
    res.redirect("/login");
};
//登陆
exports.login = function(req,res){
    res.render('login')
};
exports.checkLogin = function(req,res){
    var username = req.body.uname;
    var password = req.body.pwd;
    var param = [username,password];
    userModel.query(param,function(result){
        if(result.length>0){
            var user = result[0];
            req.session.loginUser = user;
                    res.redirect('/');
        }else{
            res.redirect('/login')
        }
    })
};

//注册
exports.register = function(req,res){
    res.render('register')
};
exports.addUser = function(req,res){
    var username = req.body.uname;
    var password = req.body.pwd;
    var email = req.body.email;
    var param = [username,password,email];
    userModel.addUser(param,function(result){
        if(result.affectedRows>0){
            res.redirect('/login')
        }else{
            res.redirect('/register')
        }
    })
};

//检验
exports.regEmail = function(req,res){
    var email = req.query.email;
    var reg = /\w+@(\w){2,5}(\.\w+){1,3}$/;
    if(reg.test(email)){
        var param = [email];
        userModel.queryEmail(param,function(result){
            if(result.length>0){
                res.send('err2');
            }else{
                res.send('success');
            }
        })
    }else{
        res.send('err1');
    }
};
exports.regUname = function(req,res){
    var uname = req.query.uname;
    var reg = /^\w{1,10}$/;
    if(reg.test(uname)){
        var param = [uname];
        userModel.queryUname(param,function(result){
            if(result.length>0){
                res.send('err2');
            }else{
                res.send('success');
            }
        })
    }else{
        res.send('err1');
    }
};





















