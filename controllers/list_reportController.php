<?php
namespace controllers;
class list_reportController{
	private $list_report,$permission,$log_movement;
	public function __construct(){
		define("controller","log-report");
		$this->list_report = new \models\list_reportModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,25,log_movement_message_list);
		$this->permission->getpermission_action(array(2,3));
		$data["d"] = $this->list_report->query();
		view("list_report.php",1,$data);
	}
	public function query(){
		$this->permission->getpermission_action(array(2,3));
		$data["d"] = $this->list_report->query();
		$this->log_movement->add($_SESSION["iduser"],3,20,query);
		view("list_report.php",1,$data);
	}
	public function pdf(){
		header("location: ".url_base.$_POST["url"]."/pdf");
	}
}
?>