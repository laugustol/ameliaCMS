<?php
namespace controllers;
class log_accessController{
	private $log_access,$permission,$log_movement;
	public function __construct(){
		define("controller","log-access");
		$this->log_access = new \models\log_accessModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,17,log_movement_message_list);
		$this->permission->getpermission_action(array(3,7));
		$data["dependencies"]["list"] = $this->log_access->listt();
		view("log_access.php",1,$data);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->log_access->idlog_access=$id;
		$_SESSION["msj"] = ($this->log_access->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,17,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],log_access,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$log_accesss = $this->log_access->pdf();
		require 'pdf/log_accessPdf.php';
	}
	public function graph(){
		echo json_encode($this->log_access->graph());
	}
}
?>