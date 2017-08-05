<?php
namespace controllers;
class log_reportController{
	private $log_report,$permission,$log_movement;
	public function __construct(){
		$this->log_report = new \Models\log_reportModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,19,log_movement_message_list);
		$this->permission->getpermission_action(array(3,7));
		view("log_report.php",1,$data);
	}
	public function listt(){
		echo json_encode($this->log_report->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function pdf(){
		$log_report = new \Models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],log_report,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$log_reports = $this->log_report->pdf();
		require 'pdf/log_reportPdf.php';
	}
}
?>