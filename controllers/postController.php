<?php
namespace controllers;
class postController{
	private $post,$permission,$log_movement;
	public function __construct(){
		define("controller","postr");
		$this->post = new \Models\postModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,22,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->post->dependencies();
		view("post.php",1,$data);
	}
	public function data($id=""){
		$this->post->idpost=$id;
		$this->post->url=$_POST["url"];
		$this->post->name=$_POST["name"];
		$this->post->color=$_POST["color"];
		$this->post->idgallery=$_POST["idgallery"];
		$this->post->content=$_POST["content"];
	}
	public function listt(){
		echo json_encode($this->post->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->post->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,22,$_SESSION["msj"],"{".id.":'',".post_url.":'".$_POST["url"]."',".post_name.":'".$_POST["name"]."',".post_color.":'".$_POST["color"]."',".post_name.":'".$_POST["name"]."',".post_img.":'".$_POST["idgallery"]."',".post_content.":'".$_POST["content"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("post.php",1);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->post->idpost=$id;
		$data["d"] = $this->post->query();
		$this->log_movement->add($_SESSION["iduser"],3,22,query,"{".id.":'".$id."'}");
		view("post.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->post->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,22,$_SESSION["msj"],"{".id.":'',".post_url.":'".$_POST["url"]."',".post_name.":'".$_POST["name"]."',".post_color.":'".$_POST["color"]."',".post_img.":'".$_POST["idgallery"]."',".post_content.":'".$_POST["content"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->post->idpost=$id;
		$_SESSION["msj"] = ($this->post->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,22,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->post->idpost=$id;
		$_SESSION["msj"] = ($this->post->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,22,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->post->idpost=$id;
		$_SESSION["msj"] = ($this->post->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],4,22,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \Models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],post,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$posts = $this->post->pdf();
		require 'pdf/postPdf.php';
	}
	public function show($url){
		$this->post->url=$url;
		$data["d"] = $this->post->query();
		view("post.php",2,$data);
	}
	public function page($num){
		$this->post->url=$url;
		$data["posts"] = $this->post->query_all($num);
		view("index.php",2,$data);
	}
}
?>