<?php
namespace controllers;
class contactController{
	private $contact,$permission,$log_movement;
	public function __construct(){
		define("controller","contact");
		$this->contact = new \models\contactModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function contactme(){
		view("contact.php",2);
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["add"] = $this->contact->dependencies();
		$data["dependencies"]["list"] = $this->contact->listt();
		view("contact.php",1,$data);
	}
	public function data($id=""){
		$this->contact->idcontact=$id;
		$this->contact->name=$_POST["name"];
		$this->contact->email=$_POST["email"];
		$this->contact->phone=$_POST["phone"];
		$this->contact->message=$_POST["message"];
		$this->contact->iduser=$_SESSION["iduser"];
		$this->contact->response=$_POST["response"];
	}
	public function add(){
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->contact->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,2,$_SESSION["msj"],"{".id.":'',".contact_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/contactme");
			exit;
		}
		header("location: ".url_base.controller."/contactme");
		exit;
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->contact->idcontact=$id;
		$data["d"] = $this->contact->query();
		$this->log_movement->add($_SESSION["iduser"],3,2,query,"{".id.":'".$id."'}");
		view("contact.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->contact->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".contact_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->contact->idcontact=$id;
		$_SESSION["msj"] = ($this->contact->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->contact->idcontact=$id;
		$_SESSION["msj"] = ($this->contact->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->contact->idcontact=$id;
		$_SESSION["msj"] = ($this->contact->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>