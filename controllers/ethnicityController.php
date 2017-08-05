<?php
namespace controllers;
class ethnicityController{
	private $ethnicity,$permission,$log_movement;
	public function __construct(){
		$this->ethnicity = new \Models\ethnicityModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,5,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->ethnicity->dependencies();
		view("ethnicity.php",1,$data);
	}
	public function data($id){
		$this->ethnicity->idethnicity=$id;
		$this->ethnicity->name=$_POST["name"];
	}
	public function listt(){
		echo json_encode($this->ethnicity->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->ethnicity->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,5,$_SESSION["msj"],"{".id.":'',".ethnicity_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("ethnicity.php",1);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->ethnicity->idethnicity=$id;
		$data["d"] = $this->ethnicity->query();
		$this->log_movement->add($_SESSION["iduser"],3,5,query,"{".id.":'".$id."'}");
		view("ethnicity.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->ethnicity->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,5,$_SESSION["msj"],"{".id.":'".$id."',".charge_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->ethnicity->idethnicity=$id;
		$_SESSION["msj"] = ($this->ethnicity->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,5,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->ethnicity->idethnicity=$id;
		$_SESSION["msj"] = ($this->ethnicity->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,5,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->ethnicity->idethnicity=$id;
		$_SESSION["msj"] = ($this->ethnicity->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,5,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \Models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],ethnicity,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$ethnicitys = $this->ethnicity->pdf();
		require 'pdf/ethnicityPdf.php';
	}
	public function search(){
		echo json_encode($this->ethnicity->search($_POST["value"]));
	}
}
?>