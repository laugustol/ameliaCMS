<?php
namespace controllers;
class organizationController{
	private $organization,$permission,$log_movement;
	public function __construct(){
		define("controller","organization");
		$this->organization = new \models\organizationModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,20,log_movement_message_list);
		$this->permission->getpermission_action(array(2,3));
		$data["d"] = $this->organization->query();
		view("organization.php",1,$data);
	}
	public function data(){
		$this->organization->name_one=$_POST["name_one"];
		$this->organization->name_two=$_POST["name_two"];
		$this->organization->email=$_POST["email"];
		$this->organization->idgallery_header=(!empty($_POST["idgallery_header"]))? $_POST["idgallery_header"] : 0;
		$this->organization->idgallery_favicon=(!empty($_POST["idgallery_favicon"]))? $_POST["idgallery_favicon"] : 0;
		$this->organization->description=$_POST["description"];
		$this->organization->address=$_POST["address"];
		$this->organization->rights=$_POST["rights"];
		$this->organization->phone_one=$_POST["phone_one"];
		$this->organization->phone_two=$_POST["phone_two"];
		$this->organization->phone_three=$_POST["phone_three"];
		$this->organization->skip_homepage=$_POST["skip_homepage"];
		$this->organization->type_web=$_POST["type_web"];
		$this->organization->number_question_answer=$_POST["number_question_answer"];
		$this->organization->login=$_POST["login"];
		$this->organization->new_password_sent_email=$_POST["new_password_sent_email"];
		$this->organization->email_host=$_POST["email_host"];
		$this->organization->email_port=$_POST["email_port"];
		$this->organization->email_security_smtp=$_POST["email_security_smtp"];
		$this->organization->email_type_security_smtp=$_POST["email_type_security_smtp"];
		$this->organization->email_user=$_POST["email_user"];
		$this->organization->email_password=$_POST["email_password"];
		$this->organization->email_subject=$_POST["email_subject"];
		$this->organization->email_message=$_POST["email_message"];
		$this->organization->number_days_password_diferrence=$_POST["number_days_password_diferrence"];
		$this->organization->number_days_password_diferrence=$_POST["number_days_password_diferrence"];
		$this->organization->number_answer_allowed=$_POST["number_answer_allowed"];
	}
	public function query(){
		$this->permission->getpermission_action(array(2,3));
		$data["d"] = $this->organization->query();
		$this->log_movement->add($_SESSION["iduser"],3,20,query);
		view("organization.php",1,$data);
	}
	public function edit(){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->organization->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,20,$_SESSION["msj"],"{".organization_name_one.":'".$_POST["name_one"]."',".organization_name_two.":'".$_POST["name_two"]."',".organization_email.":'".$_POST["email"]."',".organization_description.":'".$_POST["description"]."',".organization_address.":'".$_POST["address"]."',".organization_header.":'".$_POST["idgallery_header"]."',".organization_favicon.":'".$_POST["idgallery_favicon"]."',".organization_rights.":'".$_POST["rights"]."',".organization_phone_one.":'".$_POST["phone_one"]."',".organization_phone_two.":'".$_POST["phone_two"]."',".organization_phone_three.":'".$_POST["phone_three"]."',".configuration_number_question_answer.":'".$_POST["number_question_answer"]."',".configuration_login.":'".$_POST["login"]."',".configuration_new_password_sent_email.":'".$_POST["new_password_sent_email"]."',".organization_email_host.":'".$_POST["email_host"]."',".organization_email_port.":'".$_POST["email_port"]."',".organization_email_security_smtp.":'".$_POST["email_security_smtp"]."',".organization_type_email_security_smtp.":'".$_POST["type_email_security_smtp"]."',".organization_email_user.":'".$_POST["email_user"]."',".organization_email_password.":'".$_POST["email_password"]."',".organization_email_subject.":'".$_POST["email_subject"]."',".organization_email_message.":'".$_POST["email_message"]."',".configuration_number_days_password_diferrence.":'".$_POST["number_days_password_diferrence"]."',".configuration_number_answer_allowed.":'".$_POST["number_answer_allowed"]."'}");
			header("location: ".url_base.controller);
			exit;
		}
		$this->query($id);
	}
}
?>