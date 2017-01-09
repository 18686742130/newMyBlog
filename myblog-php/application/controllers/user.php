<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this -> load -> model("user_model");
	}
	//跳转页面
	public function index()
	{
		$result = null;

		if($this->session->userdata('user')){
			$user_id = $this->session->userdata('user')->user_id;
			$newly = $this->user_model->getly($user_id);
			$row = $this->user_model->get_type($user_id);
			$res = $this->user_model->queryCom($user_id);
			$this->session->set_userdata(array(
				"newly" => $newly
			));
			$result = $this->user_model->queryblogbyuser($user_id);
			$this->load->view('index',array("blogs"=>$result,"type"=>$row,"com"=>$res));
		}else{
			$this->load->view('index',array("blogs"=>null,"type"=>null,"com"=>null));
		}
	}
	public function setmsg()
	{
		$this->load->view("setmsg");
	}
	public function viewBlog()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$result = $this->user_model->query_blogs($user_id);
		$id=$this->input->get("id");
		$row=$this->user_model->getblog($id);
		$this->load->view("viewBlog",array("blog"=>$row,"blogs"=>$result));
	}
	public function login(){
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function adminindex()
	{
		$this->load->view("adminindex");
	}
	public function inbox()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$newly = $this->user_model->getly($user_id);
		$this->session->set_userdata(array(
			"newly" => $newly
		));
		$result = $this->user_model->queryly($user_id);
		$this->load->view("inbox",array("ly"=>$result));
	}
	public function profile()
	{
		$this->load->view("profile");
	}
	public function chpwd()
	{
		$this->load->view("chpwd");
	}
	public function userSettings()
	{
		$this->load->view("userSettings");
	}
	public function newBlog()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$row = $this->user_model->get_type($user_id);
		$this->load->view("newBlog",array("type"=>$row));
	}
	public function blogType()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$row = $this->user_model->get_type($user_id);
		$this->load->view("blogType",array("type"=>$row));
	}
	public function blogs()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$result = $this->user_model->query_blogs($user_id);
		$this->load->view("blogs",array("blogs"=>$result));
	}
	public function blogComments()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$result = $this->user_model->queryCom($user_id);
		$this->load->view("blogComments",array("com"=>$result));
	}
	//退出
	public function logout()
	{
		$this->session->set_userdata(array(
			"newly" => null
		));
		$this->session->set_userdata(array(
			"user" => null
		));
		redirect("user/login");
	}
	//检验用户名密码是否正确
	public function checkLogin()
	{
		$username = $this->input->post('name');
		$password = $this->input->post('pwd');
		$row = $this->user_model->get_by_namepwd($username,$password);
		if($row){
			$this->session->set_userdata(array(
				"user" => $row
			));
			redirect("user/index");
		}else{
			redirect("user/login");
		}
	}
	//注册用户
	public function addUser()
	{
		$username = $this->input->post('name');
		$password = $this->input->post('pwd');
		$row = $this->user_model->addUser($username,$password);
		if($row){
			redirect("user/login");
		}else{
			redirect("user/register");
		}
	}
	//检验用户名是否重复
	public function regUname()
	{
		$username = $this->input->get('name');
		$row = $this->user_model->get_uname($username);
		if($row){
			echo "file";
		}else{
			echo "success";
		}
	}
	//修改密码
	public function changePwd()
	{
		$oldpwd = $this->input->get("oldpwd");
		$newpwd = $this->input->get("newpwd");
		$user_id = $this->session->userdata('user')->user_id;
		$row = $this->user_model->query_idpwd($user_id,$oldpwd);
		if($row){
			$row1 = $this->user_model->change_pwd($user_id,$newpwd);
			if($row1){
				echo "success";
			}else{
				echo "file";
			}
		}else{
			echo "file1";
		}
	}
	//更新心情
	public function userSet()
	{
		$smile = $this->input->post("smile");
		$user_id = $this->session->userdata('user')->user_id;
		$row = $this->user_model->smile($user_id,$smile);
		if($row){
			$row1 = $this->user_model->get_byid($user_id);
			$this->session->set_userdata(array(
				"user" => $row1
			));
			redirect("user/index");
		}else{
			echo "file";
		}
	}
	//删除文章
	public function deleteBlogs()
	{
		$blogID = $this->input->get("blogID");
		$row = $this->user_model->deleteBlogs($blogID);
		if($row){
			echo "success";
		}else{
			echo "file";
		}
	}
	//创建文章
	public function createBlog()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$title = $this->input->post("title");
		$type = $this->input->post("typeID");
		$content = $this->input->post("content");
		$row = $this->user_model->createBlog($user_id,$title,$type,$content);
		if($row){
			redirect("user/blogs");
		}else{
			echo "file";
		}
	}
	//删除类型
	public function deleteType()
	{
		$typeID = $this->input->get("typeID");
		$row = $this->user_model->deleteType($typeID);
		if($row){
			echo "success";
		}else{
			echo "file";
		}
	}
	//添加类型
	public function addType()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$name = $this->input->post("name");
		$row = $this->user_model->addType($user_id,$name);
		if($row){
			redirect("user/blogType");
		}else{
			echo "file";
		}
	}
	//修改类型
	public function updateType()
	{
		$name = $this->input->get("name");
		$id   = $this->input->get("typeID");
		$row = $this->user_model->updateType($name,$id);
		if($row){
			echo "success";
		}else{
			echo "file";
		}
	}
	//删除评论
	public function deleteCom()
	{
		$id = $this->input->get("id");
		$row = $this->user_model->deleteCom($id);
		if($row){
			echo "success";
		}else{
			echo "file";
		}
	}
	//删除此人所有评论
	public function deleteall()
	{
		$id = $this->input->get("id");
		$user_id = $this->session->userdata('user')->user_id;
		$row = $this->user_model->deleteall($user_id,$id);
		if($row){
			echo "success";
		}else{
			echo "file";
		}
	}
	//发表评论
	public function newcom()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$zuozhe = $this->input->post("zuozhe");
		$blogid = $this->input->post("blogid");
		$content = $this->input->post("content");
		$row = $this->user_model->newcom($user_id,$zuozhe,$blogid,$content);
		if($row){
			redirect("user/viewBlog?id=$blogid");
		}else{
			echo "file";
		}
	}
	//修改会员资料
	public function personal()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$name = $this->input->post("name");
		$sex  = $this->input->post("sex");
		$born = $this->input->post("y").".".$this->input->post("m").".".$this->input->post("d");
		$place = $this->input->post("province")."-".$this->input->post("city");
		$signature = $this->input->post("signature");
		$row = $this->user_model->addpersonal($user_id,$name,$sex,$born,$place,$signature);
		if($row){
			redirect("user/profile");
		}else{
			echo "file";
		}
	}
	//修改文章
	public function updateblog()
	{
		$id=$this->input->get("id");
		$row=$this->user_model->getblog($id);
		$user_id = $this->session->userdata('user')->user_id;
		$result = $this->user_model->query_blogs($user_id);
		$this->load->view("updateblog",array("blog"=>$row,"blogs"=>$result));
	}
	public function updatebbb()
	{
		$id = $this->input->post("id");
		$title = $this->input->post("title");
		$content = $this->input->post("content");
		$row = $this->user_model->updatebbb($id,$title,$content);
		if($row){
			redirect("user/viewBlog?id=$id");
		}else{
			echo "fail";
		}
	}
	//回复留言
	public function huifu()
	{
		$content = $this->input->get("ly");
		$id = $this->input->get("id");
		$row = $this->user_model->addhuifu($id,$content);
		if($row){
			echo "success";
		}else{
			echo "file";
		}
	}
	//删除留言
	public function deletely()
	{
		$id = $this->input->get("id");
		$row = $this->user_model->deletely($id);
		if($row){
			echo "success";
		}else{
			echo "file";
		}
	}
	//发送留言
	public function setly()
	{
		$user_id = $this->session->userdata('user')->user_id;
		$content = $this->input->post("ly");
		$row = $this->user_model->setly($content,$user_id,$user_id);
		if($row){
			redirect("user/index");
		}else{
			echo "file";
		}
	}

}
