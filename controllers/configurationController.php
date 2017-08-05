<?php
namespace controllers;
class configurationController{
	private $configuration,$permission,$log_movement;
	public function __construct(){
		$this->configuration = new \Models\configurationModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,26,log_movement_message_list);
		$this->permission->getpermission_action(array(2,3));
		$data["d"] = $this->configuration->query();
		view("configuration.php",1,$data);
	}
	public function data(){
		$this->configuration->number_question_answer=$_POST["number_question_answer"];
		$this->configuration->login=$_POST["login"];
		$this->configuration->new_password_sent_email=$_POST["new_password_sent_email"];
		$this->configuration->email_host=$_POST["email_host"];
		$this->configuration->email_port=$_POST["email_port"];
		$this->configuration->email_security_smtp=$_POST["email_security_smtp"];
		$this->configuration->email_type_security_smtp=$_POST["email_type_security_smtp"];
		$this->configuration->email_user=$_POST["email_user"];
		$this->configuration->email_password=$_POST["email_password"];
		$this->configuration->email_subject=$_POST["email_subject"];
		$this->configuration->email_message=$_POST["email_message"];
		$this->configuration->number_days_password_diferrence=$_POST["number_days_password_diferrence"];
		$this->configuration->number_days_password_diferrence=$_POST["number_days_password_diferrence"];
		$this->configuration->number_answer_allowed=$_POST["number_answer_allowed"];
	}
	public function query(){
		$this->permission->getpermission_action(array(2,3));
		$data["d"] = $this->configuration->query();
		$this->log_movement->add($_SESSION["iduser"],3,26,query);
		view("configuration.php",1,$data);
	}
	public function edit(){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->configuration->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,26,$_SESSION["msj"],"{".configuration_number_question_answer.":'".$_POST["number_question_answer"]."',".configuration_login.":'".$_POST["login"]."',".configuration_new_password_sent_email.":'".$_POST["new_password_sent_email"]."',".organization_email_host.":'".$_POST["email_host"]."',".organization_email_port.":'".$_POST["email_port"]."',".organization_email_security_smtp.":'".$_POST["email_security_smtp"]."',".organization_type_email_security_smtp.":'".$_POST["type_email_security_smtp"]."',".organization_email_user.":'".$_POST["email_user"]."',".organization_email_password.":'".$_POST["email_password"]."',".organization_email_subject.":'".$_POST["email_subject"]."',".organization_email_message.":'".$_POST["email_message"]."',".configuration_number_days_password_diferrence.":'".$_POST["number_days_password_diferrence"]."',".configuration_number_answer_allowed.":'".$_POST["number_answer_allowed"]."'}");
			header("location: ".url_base.controller."/edit");
			exit;
		}
		$this->query($id);
	}
}
?>