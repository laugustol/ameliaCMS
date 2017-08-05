<?php
namespace controllers;
class list_reportController{
	private $list_report,$permission,$log_movement;
	public function __construct(){
		$this->list_report = new \Models\list_reportModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,25,log_movement_message_list);
		$this->permission->getpermission_action(array(2,3));
		$data["d"] = $this->list_report->query();
		view("list_report.php",1,$data);
	}
	public function data(){
		$this->list_report->name_one=$_POST["name_one"];
		$this->list_report->name_two=$_POST["name_two"];
		$this->list_report->email=$_POST["email"];
		$this->list_report->description=$_POST["description"];
		$this->list_report->rights=$_POST["rights"];
		$this->list_report->phone_one=$_POST["phone_one"];
		$this->list_report->phone_two=$_POST["phone_two"];
		$this->list_report->phone_three=$_POST["phone_three"];
		$this->list_report->login=$_POST["login"];
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