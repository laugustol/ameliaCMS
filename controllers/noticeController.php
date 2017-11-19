<?php
namespace controllers;
class noticeController{
	private $notice,$permission,$log_movement;
	public function __construct(){
		define("controller","notice");
		$this->notice = new \models\noticeModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->notice->dependencies();
		view("notice.php",1,$data);
	}
	public function data($id=""){
		$this->notice->idnotice=$id;
		$this->notice->title=$_POST["title"];
		$this->notice->content=$_POST["content"];
		$this->notice->url=$_POST["url"];
	}
	public function listt(){
		echo json_encode($this->notice->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->notice->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,2,$_SESSION["msj"],"{".id.":'',".notice_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("notice.php",1);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->notice->idnotice=$id;
		$data["d"] = $this->notice->query();
		$this->log_movement->add($_SESSION["iduser"],3,2,query,"{".id.":'".$id."'}");
		view("notice.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->notice->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".notice_title.":'".$_POST["name"]."',".notice_content.":'".$_POST["content"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->notice->idnotice=$id;
		$_SESSION["msj"] = ($this->notice->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->notice->idnotice=$id;
		$_SESSION["msj"] = ($this->notice->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->notice->idnotice=$id;
		$_SESSION["msj"] = ($this->notice->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>