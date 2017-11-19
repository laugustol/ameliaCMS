<?php
namespace controllers;
class log_movementController{
	private $log_movement,$permission;
	public function __construct(){
		define("controller","log_movement");
		$this->log_movement = new \models\log_movementModel;
		$this->permission = new \models\permissionModel;
	}
	public function index(){
		$this->permission->getpermission_action(array(3,7));
		view("log_movement.php",1,$data);
	}
	public function listt(){
		echo json_encode($this->log_movement->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->log_movement->idlog_movement=$id;
		$_SESSION["msj"] = ($this->log_movement->delete())? delete_success : delete_error;
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],log_movement,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$log_movements = $this->log_movement->pdf();
		require 'pdf/log_movementPdf.php';
	}
}
?>