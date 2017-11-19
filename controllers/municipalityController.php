<?php
namespace controllers;
class municipalityController{
	private $municipality,$permission,$log_movement;
	public function __construct(){
		define("controller","municipality");
		$this->municipality = new \models\addressModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,11,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->municipality->dependencies();
		view("address.php",1,$data);
	}
	public function data($id=""){
		$this->municipality->idaddress=$id;
		$this->municipality->idfather=$_POST["idfather"];
		$this->municipality->name=$_POST["name"];
	}
	public function listt(){
		echo json_encode($this->municipality->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length'],"municipality"));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->municipality->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,11,$_SESSION["msj"],"{".id.":'',".address_name.":'".$_POST["name"]."',".municipality_father.":'".$_POST["idfather"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->municipality->dependencies();
		view("address.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->municipality->idaddress=$id;
		$data["d"] = $this->municipality->query();
		$data["dependencies"] = $this->municipality->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,11,query,"{".id.":'".$id."'}");
		view("address.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(array(2));
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->municipality->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,11,$_SESSION["msj"],"{".id.":'',".address_name.":'".$_POST["name"]."',".municipality_father.":'".$_POST["idfather"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(array(7));
		$this->municipality->idaddress=$id;
		$_SESSION["msj"] = ($this->municipality->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,11,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(array(4));
		$this->municipality->idaddress=$id;
		$_SESSION["msj"] = ($this->municipality->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,11,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(array(5));
		$this->municipality->idaddress=$id;
		$_SESSION["msj"] = ($this->municipality->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,11,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],municipality,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$municipalitys = $this->municipality->pdf_municipality();
		require 'pdf/municipalityPdf.php';
	}
	public function search(){
		echo json_encode($this->municipality->search_s($_POST["value"]));
	}
}
?>