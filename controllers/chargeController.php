<?php
namespace controllers;
class chargeController{
	private $charge,$permission,$log_movement;
	public function __construct(){
		$this->charge = new \Models\chargeModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->charge->dependencies();
		view("charge.php",1,$data);
	}
	public function data($id){
		$this->charge->idcharge=$id;
		$this->charge->name=$_POST["name"];
	}
	public function listt(){
		echo json_encode($this->charge->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->charge->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,2,$_SESSION["msj"],"{".id.":'',".charge_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("charge.php",1);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->charge->idcharge=$id;
		$data["d"] = $this->charge->query();
		$this->log_movement->add($_SESSION["iduser"],3,2,query,"{".id.":'".$id."'}");
		view("charge.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->charge->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".charge_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->charge->idcharge=$id;
		$_SESSION["msj"] = ($this->charge->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->charge->idcharge=$id;
		$_SESSION["msj"] = ($this->charge->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->charge->idcharge=$id;
		$_SESSION["msj"] = ($this->charge->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \Models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],charge,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$charges = $this->charge->pdf();
		require 'pdf/chargePdf.php';
	}
}
?>