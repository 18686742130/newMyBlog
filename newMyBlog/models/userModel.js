var db = require('./db');

exports.query = function(param,callback){
    var sql = "select * from t_user where username = ? and password = ?";
    db.query(sql,param,callback);
};
//注册
exports.addUser = function(param,callback){
    var sql = "insert into t_user(username,password,email) values(?,?,?)";
    db.query(sql,param,callback);
};

//检验
exports.queryEmail = function(param,callback){
    var sql = "select * from t_user where email = ?";
    db.query(sql,param,callback);
};
exports.queryUname = function(param,callback){
    var sql = "select * from t_user where username = ?";
    db.query(sql,param,callback);
};
//查询文章详细信息(显示在index)
exports.queryBlogSomething = function(param,callback){
    var sql = "select t_blog.*,t_type.type_name,(select count(*) from t_comm where t_blog.blog_id=t_comm.blog_id) num from t_blog left join t_type on t_blog.type_id = t_type.type_id where t_blog.user_id = ? ";
    db.query(sql,param,callback);
};
