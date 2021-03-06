<?php
namespace controllers;
class log_reportController{
	private $log_report,$permission,$log_movement;
	public function __construct(){
		define("controller","log-report");
		$this->log_report = new \models\log_reportModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,19,log_movement_message_list);
		$this->permission->getpermission_action(array(3,7));
		$data["dependencies"]["list"] = $this->log_report->listt();
		view("log_report.php",1,$data);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],log_report,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$log_reports = $this->log_report->pdf();
		require 'pdf/log_reportPdf.php';
	}
	public function graph(){
		echo json_encode($this->log_report->graph());
	}
}
?>