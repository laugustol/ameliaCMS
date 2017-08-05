<?php
namespace controllers;
class organizationController{
	private $organization,$permission,$log_movement;
	public function __construct(){
		$this->organization = new \Models\organizationModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
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
		$this->organization->idgallery_header=$_POST["idgallery_header"];
		$this->organization->idgallery_favicon=$_POST["idgallery_favicon"];
		$this->organization->description=$_POST["description"];
		$this->organization->address=$_POST["address"];
		$this->organization->rights=$_POST["rights"];
		$this->organization->phone_one=$_POST["phone_one"];
		$this->organization->phone_two=$_POST["phone_two"];
		$this->organization->phone_three=$_POST["phone_three"];
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
			$this->log_movement->add($_SESSION["iduser"],2,20,$_SESSION["msj"],"{".organization_name_one.":'".$_POST["name_one"]."',".organization_name_two.":'".$_POST["name_two"]."',".organization_email.":'".$_POST["email"]."',".organization_description.":'".$_POST["description"]."',".organization_address.":'".$_POST["address"]."',".organization_header.":'".$_POST["idgallery_header"]."',".organization_favicon.":'".$_POST["idgallery_favicon"]."',".organization_rights.":'".$_POST["rights"]."',".organization_phone_one.":'".$_POST["phone_one"]."',".organization_phone_two.":'".$_POST["phone_two"]."',".organization_phone_three.":'".$_POST["phone_three"]."'}");
			header("location: ".url_base.controller."/edit");
			exit;
		}
		$this->query($id);
	}
}
?>