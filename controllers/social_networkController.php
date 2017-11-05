<?php
namespace controllers;
class social_networkController{
	private $social_network,$permission,$log_movement;
	public function __construct(){
		define("controller","social_network");
		$this->social_network = new \Models\social_networkModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,24,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->social_network->dependencies();
		view("social_network.php",1,$data);
	}
	public function data($id=""){
		$this->social_network->idsocial_network=$id;
		$this->social_network->name=$_POST["name"];
		$this->social_network->url=$_POST["url"];
		$this->social_network->idicon=$_POST["idicon"];
	}
	public function listt(){
		echo json_encode($this->social_network->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->social_network->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,24,$_SESSION["msj"],"{".id.":'',".social_network_name.":'".$_POST["name"]."',".social_network_url.":'".$_POST["url"]."',".social_network_icon.":'".$_POST["idicon"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->social_network->dependencies();
		view("social_network.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->social_network->idsocial_network=$id;
		$data["d"] = $this->social_network->query();
		$data["dependencies"] = $this->social_network->dependencies();
		view("social_network.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->social_network->edit())? edit_success : edit_error;
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->social_network->idsocial_network=$id;
		$_SESSION["msj"] = ($this->social_network->delete())? delete_success : delete_error;
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->social_network->idsocial_network=$id;
		$_SESSION["msj"] = ($this->social_network->status(1))? activate_success : activate_error;
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->social_network->idsocial_network=$id;
		$_SESSION["msj"] = ($this->social_network->status(0))? deactivate_success : deactivate_error;
		header("location: ".url_base.controller);
	}
}
?>