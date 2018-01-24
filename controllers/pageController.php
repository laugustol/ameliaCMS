<?php
namespace controllers;
class pageController{
	private $page,$permission,$log_movement;
	public function __construct(){
		define("controller","page");
		$this->page = new \models\pageModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,23,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->page->dependencies();
		$data["dependencies"]["list"] = $this->page->listt();
		view("page.php",1,$data);
	}
	public function data($id=""){
		$this->page->idpage=$id;
		$this->page->url=$_POST["url"];
		$this->page->link=$_POST["link"];
		$this->page->name=$_POST["name"];
		$this->page->img=$_POST["img"];
		$this->page->content=$_POST["content"];
		$this->page->view_main=$_POST["view_main"];
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->page->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,23,$_SESSION["msj"],"{".id.":'',".page_url.":'".$_POST["url"]."',".page_name.":'".$_POST["name"]."',".post_name.":'".$_POST["name"]."',".post_img.":'".$_POST["idgallery"]."',".post_content.":'".$_POST["content"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("page.php",1);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->page->idpage=$id;
		$data["d"] = $this->page->query();
		$this->log_movement->add($_SESSION["iduser"],3,23,query,"{".id.":'".$id."'}");
		view("page.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->page->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,23,$_SESSION["msj"],"{".id.":'',".page_url.":'".$_POST["url"]."',".page_name.":'".$_POST["name"]."',".page_name.":'".$_POST["name"]."',".page_img.":'".$_POST["idgallery"]."',".page_content.":'".$_POST["content"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->page->idpage=$id;
		$_SESSION["msj"] = ($this->page->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,23,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->page->idpage=$id;
		$_SESSION["msj"] = ($this->page->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,23,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->page->idpage=$id;
		$_SESSION["msj"] = ($this->page->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,23,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function show($url){
		$this->page->url=$url;
		$data["d"] = $this->page->query();
		view("page.php",2,$data);
	}
}
?>