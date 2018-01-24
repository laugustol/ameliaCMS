<?php
namespace controllers;
class parishController{
	private $parish,$permission,$log_movement;
	public function __construct(){
		define("controller","parish");
		$this->parish = new \models\addressModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->parish->dependencies();
		$data["dependencies"]["list"] = $this->parish->listt('parish');
		view("address.php",1,$data);
	}
	public function data($id=""){
		$this->parish->idaddress=$id;
		$this->parish->idfather=$_POST["idfather"];
		$this->parish->name=$_POST["name"];
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->parish->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,10,$_SESSION["msj"],"{".id.":'',".charge_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->parish->dependencies();
		view("address.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->parish->idaddress=$id;
		$data["d"] = $this->parish->query();
		$data["dependencies"] = $this->parish->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,10,query,"{".id.":'".$id."'}");
		view("address.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->parish->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,10,$_SESSION["msj"],"{".id.":'',".address_name.":'".$_POST["name"]."',".parish_father.":'".$_POST["idfather"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->parish->idaddress=$id;
		$_SESSION["msj"] = ($this->parish->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,10,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->parish->idaddress=$id;
		$_SESSION["msj"] = ($this->parish->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,10,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->parish->idaddress=$id;
		$_SESSION["msj"] = ($this->parish->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,10,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],parish,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$parishs = $this->parish->pdf_parish();
		require 'pdf/parishPdf.php';
	}
	public function search_m(){
		echo json_encode($this->parish->search_s($_POST["value"]));
	}
	public function search(){
		echo json_encode($this->parish->search($_POST["value"]));
	}
}
?>