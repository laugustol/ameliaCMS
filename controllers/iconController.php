<?php
namespace controllers;
class iconController{
	private $icon,$permission,$log_movement;
	public function __construct(){
		$this->icon = new \Models\iconModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,8,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->icon->dependencies();
		view("icon.php",1,$data);
	}
	public function data($id){
		$this->icon->idicon=$id;
		$this->icon->class=$_POST["class"];
		$this->icon->name=$_POST["name"];
	}
	public function listt(){
		echo json_encode($this->icon->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->icon->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,8,$_SESSION["msj"],"{".id.":'',".icon_class.":'".$_POST["class"]."',".icon_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->icon->dependencies();
		view("icon.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->icon->idicon=$id;
		$data["d"] = $this->icon->query();
		$data["dependencies"] = $this->icon->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,8,query,"{".id.":'".$id."'}");
		view("icon.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->icon->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,8,$_SESSION["msj"],"{".id.":'',".icon_class.":'".$_POST["class"]."',".icon_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->icon->idicon=$id;
		$_SESSION["msj"] = ($this->icon->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,8,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->icon->idicon=$id;
		$_SESSION["msj"] = ($this->icon->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,8,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->icon->idicon=$id;
		$_SESSION["msj"] = ($this->icon->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,8,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>