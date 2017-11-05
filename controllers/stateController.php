<?php
namespace controllers;
class stateController{
	private $state,$permission,$log_movement;
	public function __construct(){
		define("controller","state");
		$this->state = new \Models\addressModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,12,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->state->dependencies();
		view("address.php",1,$data);
	}
	public function data($id=""){
		$this->state->idaddress=$id;
		$this->state->idfather=$_POST["idfather"];
		$this->state->name=$_POST["name"];
	}
	public function listt(){
		echo json_encode($this->state->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length'],"state"));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->state->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,12,$_SESSION["msj"],"{".id.":'',".address_name.":'".$_POST["name"]."',".municipality_father.":'".$_POST["idfather"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->state->dependencies();
		view("address.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->state->idaddress=$id;
		$data["d"] = $this->state->query();
		$data["dependencies"] = $this->state->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,12,query,"{".id.":'".$id."'}");
		view("address.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->state->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,12,$_SESSION["msj"],"{".id.":'',".address_name.":'".$_POST["name"]."',".state_father.":'".$_POST["idfather"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->state->idaddress=$id;
		$_SESSION["msj"] = ($this->state->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,12,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->state->idaddress=$id;
		$_SESSION["msj"] = ($this->state->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,12,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->state->idaddress=$id;
		$_SESSION["msj"] = ($this->state->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,12,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \Models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],state,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$states = $this->state->pdf_state();
		require 'pdf/statePdf.php';
	}
	public function search(){
		echo json_encode($this->state->search_c($_POST["value"]));
	}
}
?>