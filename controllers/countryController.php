<?php
namespace controllers;
class countryController{
	private $country,$permission,$log_movement;
	public function __construct(){
		define("controller","country");
		$this->country = new \models\addressModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,13,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->country->dependencies();
		$data["dependencies"]["list"] = $this->country->listt('country');
		view("address.php",1,$data);
	}
	public function data($id=""){
		$this->country->idaddress=$id;
		$this->country->idfather=(isset($_POST["idfather"]))? $_POST["idfather"] : 0;
		$this->country->name=$_POST["name"];
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->country->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,13,$_SESSION["msj"],"{".id.":'',".address_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->country->dependencies();
		view("address.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->country->idaddress=$id;
		$data["d"] = $this->country->query();
		$data["dependencies"] = $this->country->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,13,query,"{".id.":'".$id."'}");
		view("address.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->country->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,13,$_SESSION["msj"],"{".id.":'".$id."',".address_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->country->idaddress=$id;
		$_SESSION["msj"] = ($this->country->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,13,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->country->idaddress=$id;
		$_SESSION["msj"] = ($this->country->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,13,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->country->idaddress=$id;
		$_SESSION["msj"] = ($this->country->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,13,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],country,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$countrys = $this->country->pdf_country();
		require 'pdf/countryPdf.php';
	}
}
?>