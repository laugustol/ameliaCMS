<?php
namespace controllers;
class galleryController{
	private $gallery,$permission;
	public function __construct(){
		define("controller","gallery");
		$this->gallery = new \Models\galleryModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,27,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->gallery->dependencies();
		view("gallery.php",1,$data);
	}
	public function data($id=""){
		$this->gallery->idgallery=$id;
		$this->gallery->iduser=$_SESSION["iduser"];
		$this->gallery->src=$_POST["src"];
		$this->gallery->title=$_POST["title"];
		$this->gallery->legend=$_POST["legend"];
		$this->gallery->alternative=$_POST["alternative"];
		$this->gallery->description=$_POST["description"];
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->gallery->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,27,$_SESSION["msj"],"{".id.":'',".gallery_src.":'".$_POST["src"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("gallery.php",1);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->gallery->idgallery=$id;
		$this->gallery->src=$_POST["src"];
		$this->log_movement->add($_SESSION["iduser"],3,27,query,"{".id.":'',".gallery_src.":'".$_POST["src"]."'}");
		echo json_encode($this->gallery->query());
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->gallery->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,27,$_SESSION["msj"],"{".id.":'',".gallery_src.":'".$_POST["src"]."',title:'".$_POST["title"]."',legend:'".$_POST["legend"]."',alternative:'".$_POST["alternative"]."',description:'".$_POST["description"]."'}");
			header("location: ".url_base.controller);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->gallery->idgallery=$id;
		$src = $this->gallery->delete();
		$_SESSION["msj"] = (unlink($src))? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,27,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function upload(){
		if (isset($_FILES["image"])){
		    $tipo = explode("image/",$_FILES['image']['type']);
			if($tipo[1]=='gif' OR $tipo[1]=='jpg' OR $tipo[1]=='png' OR $tipo[1]=='jpeg'){
			    $name = "uploads/gallery/".date("YmdHis").$_FILES["image"]["name"];
			    $this->gallery->src = $name;
			    $this->gallery->add();
			    move_uploaded_file($_FILES["image"]["tmp_name"], $name);
			    echo "<img src='".url_base."$name'>";
			}
		}
	}
	public function show($url){
		$this->gallery->url=$url;
		$data["d"] = $this->gallery->query();
		view("gallery.php",2,$data);
	}
	public function show_ajax(){
		if($_POST["event"] == "ajax"){
			echo json_encode($this->gallery->query_all());
		}
	}
}
?>