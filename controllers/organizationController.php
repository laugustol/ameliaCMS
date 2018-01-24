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
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		echo $this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->organization->dependencies();
		$data["dependencies"]["list"] = $this->organization->listt();
		view("organization.php",1,$data);
	}
	public function data($id=""){
		$this->organization->idorganization=$id;
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
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->organization->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,2,$_SESSION["msj"],"{".id.":'',".organization_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		view("organization.php",1);
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->organization->idorganization=$id;
		$data["d"] = $this->organization->query();
		$this->log_movement->add($_SESSION["iduser"],3,2,query,"{".id.":'".$id."'}");
		view("organization.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->organization->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".organization_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->organization->idorganization=$id;
		$_SESSION["msj"] = ($this->organization->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->organization->idorganization=$id;
		$_SESSION["msj"] = ($this->organization->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->organization->idorganization=$id;
		$_SESSION["msj"] = ($this->organization->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],organization,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$organizations = $this->organization->pdf();
		require 'pdf/organizationPdf.php';
	}
}
?>
