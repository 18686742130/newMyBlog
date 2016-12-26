var db = require("./db");

//修改密码
exports.changePWD = function(param,callback){
  var sql = "update t_user set password = ? where user_id = ? and password = ? ";
  db.query(sql,param,callback);
};
//更改心情
exports.querySmile = function(param,callback){
  var sql = "update t_user set smile= ? where user_id= ? ";
  db.query(sql,param,callback);
};
exports.queryUser = function(param,callback){
  var sql = "select * from t_user where user_id = ? ";
  db.query(sql,param,callback);
};
//文章详情
exports.viewBlog = function(param,callback){
  var sql = "select t_blog.*,t_comm.* ,t_user.username from t_blog left join t_comm on t_blog.blog_id=t_comm.blog_id left JOIN t_user on t_comm.user_id = t_user.user_id where t_blog.blog_id = ?  ";
  db.query(sql,param,callback);
};
//创建文章
exports.addBlog = function(param,callback){
  var sql = "insert into t_blog(title,content,user_id,type_id) values(?,?,?,?)";
    db.query(sql,param,callback);
};
//查询所有文章
exports.queryBlogs = function(param,callback){
  var sql = "select * from t_blog where user_id = ?";
  db.query(sql,param,callback);
};
//删除文章
exports.deleteBlogs = function(param,callback){
  var sql = "delete from t_blog where blog_id in("+param+")";
  db.query(sql,"",callback);
};
//查询类型
exports.queryType = function(param,callback){
  var sql = "select type.*, (select count(*) from t_blog blog where blog.type_id=type.type_id and blog.user_id= ? ) num from t_type type where type.user_id= ? ";
  db.query(sql,param,callback);
};
//查询评论
exports.queryComm = function(param,callback){
  var sql = "select t_blog.title,t_comm.*,t_user.username from t_blog,t_comm,t_user where t_blog.user_id = ? and t_blog.blog_id = t_comm.blog_id and t_comm.user_id = t_user.user_id";
  db.query(sql,param,callback);
};
//添加类型
exports.addType = function(param,callback){
  var sql = "insert into t_type(type_name,user_id) values(?,?)";
  db.query(sql,param,callback);
};
//删除类型
exports.deleteType = function(param,callback){
  var sql = "delete from t_type where type_id = ? ";
  db.query(sql,param,callback);
};