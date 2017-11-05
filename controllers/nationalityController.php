<?php
namespace controllers;
class nationalityController{
	private $nationality,$permission,$log_movement;
	public function __construct(){
		define("controller","nationality");
		$this->nationality = new \Models\nationalityModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,6,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->nationality->dependencies();
		view("nationality.php",1,$data);
	}
	public function data($id=""){
		$this->nationality->idnationality=$id;
		$this->nationality->name_one=$_POST["name_one"];
		$this->nationality->name_two=$_POST["name_two"];
	}
	public function listt(){
		echo json_encode($this->nationality->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->nationality->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,6,$_SESSION["msj"],"{".id.":'',".nationality_name_one.":'".$_POST["name_one"]."',".nationality_name_two.":'".$_POST["name_two"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("nationality.php",1);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->nationality->idnationality=$id;
		$data["d"] = $this->nationality->query();
		$this->log_movement->add($_SESSION["iduser"],3,6,query,"{".id.":'".$id."'}");
		view("nationality.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->nationality->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,6,$_SESSION["msj"],"{".id.":'',".nationality_name_one.":'".$_POST["name_one"]."',".nationality_name_two.":'".$_POST["name_two"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->nationality->idnationality=$id;
		$_SESSION["msj"] = ($this->nationality->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,6,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->nationality->idnationality=$id;
		$_SESSION["msj"] = ($this->nationality->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,6,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->nationality->idnationality=$id;
		$_SESSION["msj"] = ($this->nationality->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,6,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \Models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],nationality,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$nationalitys = $this->nationality->pdf();
		require 'pdf/nationalityPdf.php';
	}
	public function search(){
		echo json_encode($this->nationality->search($_POST["value"]));
	}
}
?>