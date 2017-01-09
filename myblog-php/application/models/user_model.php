<?php

class user_model extends CI_Model {

    public function get_by_namepwd($name,$pwd)
    {
        return $this->db->get_where("t_user",array("username"=>$name,"password"=>$pwd))->row();
    }
    public function addUser($name,$pwd)
    {
        $this->db->insert("t_user",array(
            "username"=>$name,"password"=>$pwd
        ));
        return $this->db->affected_rows();
    }
    public function get_uname($name)
    {
        return $this->db->get_where("t_user",array("username"=>$name))->row();
    }
    public function query_idpwd($id,$oldpwd)
    {
        return $this->db->get_where("t_user",array("user_id"=>$id,"password"=>$oldpwd))->row();
    }
    public function change_pwd($id,$newpwd)
    {
        $this->db->where("user_id",$id);
        $this->db->update("t_user",array(
            "password"=>$newpwd
        ));
        return $this->db->affected_rows();
    }
    public function smile($id,$smile)
    {
        $this->db->where("user_id",$id);
        $this->db->update("t_user",array(
            "smile"=>$smile
        ));
        return $this->db->affected_rows();
    }
    public function get_byid($id)
    {
        return $this->db->get_where("t_user",array("user_id"=>$id))->row();
    }
    public function query_blogs($id)
    {
        return $this->db->get_where("t_blog",array("user_id"=>$id))->result();
    }
    public function deleteBlogs($id)
    {
        return $this->db->query("delete from t_blog where blog_id in ($id)");
    }
    public function get_type($id)
    {
        return $this->db->query("select type.*, (select count(*) from t_blog blog where blog.type_id=type.type_id) num from t_type type where type.user_id=$id") -> result();
    }
    public function createBlog($id,$title,$type,$content)
    {
        $this->db->insert("t_blog",array(
            "user_id"=>$id,
            "type_id"=>$type,
            "title"=>$title,
            "content"=>$content
        ));
        return $this->db->affected_rows();
    }
    public function deleteType($typeID)
    {
        $this->db->delete("t_type",array("type_id"=>$typeID));
        return $this->db->affected_rows();
    }
    public function addType($id,$name)
    {
        $this->db->insert("t_type",array(
           "user_id"=>$id,
            "type_name"=>$name
        ));
        return $this->db->affected_rows();
    }
    public function updateType($name,$id)
    {
        $this->db->where("type_id",$id);
        $this->db->update("t_type",array(
            "type_name"=>$name
        ));
        return $this->db->affected_rows();
    }
    public function queryCom($id)
    {
        return $this->db->query("select t_blog.title,t_comm.*,t_user.username from t_blog,t_comm,t_user where t_blog.user_id = $id and t_blog.blog_id = t_comm.blog_id and t_comm.comm_user = t_user.user_id")->result();
    }
    public function deleteCom($id)
    {
        $this->db->delete("t_comm",array("comm_id"=>$id));
        return $this->db->affected_rows();
    }
    public function deleteall($zuozhe,$id)
    {
        $this->db->delete("t_comm",array("zuozhe"=>$zuozhe,"comm_user"=>$id));
        return $this->db->affected_rows();
    }
    public function queryblogbyuser($id)
    {
        return $this->db->query("select t_blog.*,t_type.type_name,(select count(*) from t_comm where t_blog.blog_id=t_comm.blog_id) num from t_blog left join t_type on t_blog.type_id = t_type.type_id where t_blog.user_id = $id")->result();
    }
    public function getblog($id)
    {
        return $this->db->query("select t_blog.*,t_comm.comm_id,t_comm.commcon,t_comm.comm_time,t_comm.comm_user,t_user.username from t_blog left join t_comm on t_blog.blog_id=t_comm.blog_id left JOIN t_user on t_comm.comm_user = t_user.user_id where t_blog.blog_id = $id")->result();
//        return $this->db->query("select t_blog.*,t_comm.* ,t_user.username from t_blog left join t_comm on t_blog.blog_id=t_comm.blog_id left JOIN t_user on t_comm.user_id = t_user.user_id where t_blog.blog_id=$id")->result();
    }
    public function newcom($userid,$zuozhe,$blogid,$content)
    {
        $this -> db -> insert("t_comm", array(
            "commcon"=>$content,
            "blog_id"=>$blogid,
            "comm_user"=>$userid,
            "zuozhe"=>$zuozhe
        ));
        return $this->db->affected_rows();
    }
    public function addpersonal($id,$name,$sex,$born,$place,$signature)
    {
        $this->db->where("user_id",$id);
        $this->db->update("t_user",array(
            "name"=>$name,
            "sex"=>$sex,
            "born"=>$born,
            "place"=>$place,
            "signature"=>$signature
        ));
        return $this->db->affected_rows();
    }
    public function updatebbb($id,$title,$content)
    {
        $this->db->where("blog_id",$id);
        $this->db->update("t_blog",array(
            "title"=>$title,
            "content"=>$content
        ));
        return $this->db->affected_rows();
    }
    public function queryly($id)
    {
        return $this->db->query("select t_ly.*,t_user.username from t_ly,t_user where t_ly.user_id = $id and t_ly.lyperson=t_user.user_id")->result();
    }
    public function addhuifu($id,$content)
    {
        $this->db->where("ly_id",$id);
        $this->db->update("t_ly",array("huifu"=>$content,"tf"=>1));
        return $this->db->affected_rows();
    }
    public function deletely($id)
    {
        $this->db->delete("t_ly",array("ly_id"=>$id));
        return $this->db->affected_rows();
    }
    public function setly($content,$id,$id2)
    {
        $this->db->insert("t_ly",array("content"=>$content,"user_id"=>$id,"lyperson"=>$id2,"tf"=>0));
        return $this->db->affected_rows();
    }
    public function getly($id)
    {
        return $this->db->get_where("t_ly",array("user_id"=>$id,"tf"=>"0"))->result();
    }
}
