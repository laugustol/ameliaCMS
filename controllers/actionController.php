<?php
namespace controllers;
class actionController{
	private $action,$permission,$log_movement,$function;
	public function __construct(){
		define("controller","action");
		$this->action = new \models\actionModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,3,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->action->dependencies();
		view("action.php",1,$data);
	}
	public function data($id=""){
		$this->action->idaction=$id;
		$this->action->name=$_POST["name"];
		$this->action->function=$_POST["function"];
		if($_POST["function"] == "1"){
			$this->function = action_function_opt1;
		}else if($_POST["function"] == "2"){
			$this->function = action_function_opt2;
		}else if($_POST["function"] == "3"){
			$this->function = action_function_opt3;
		}else if($_POST["function"] == "4"){
			$this->function = action_function_opt4;
		}else if($_POST["function"] == "5"){
			$this->function = action_function_opt5;
		}else if($_POST["function"] == "6"){
			$this->function = action_function_opt6;
		}else if($_POST["function"] == "7"){
			$this->function = action_function_opt7;
		}
		$this->action->idicon=$_POST["idicon"];
	}
	public function listt(){
		echo json_encode($this->action->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->action->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,3,$_SESSION["msj"],"{".id.":'".$id."',".action_name.":'".$_POST["name"]."',".action_function.":'".$this->function."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->action->dependencies();
		view("action.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->action->idaction=$id;
		$data["d"] = $this->action->query();
		$data["dependencies"] = $this->action->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,3,query,"{".id.":'".$id."'}");
		view("action.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->action->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,3,$_SESSION["msj"],"{".id.":'".$id."',".action_name.":'".$_POST["name"]."',".action_function.":'".$this->function."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->action->idaction=$id;
		$_SESSION["msj"] = ($this->action->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,3,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->action->idaction=$id;
		$_SESSION["msj"] = ($this->action->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,3,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->action->idaction=$id;
		$_SESSION["msj"] = ($this->action->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,3,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>