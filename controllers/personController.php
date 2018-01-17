<?php
namespace controllers;
class personController{
	private $person,$permission,$log_movement;
	public function __construct(){
		define("controller","person");
		$this->person = new \models\personModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,14,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->person->dependencies();
		view("person.php",1,$data);
	}
	public function data($id=""){
		$this->person->idperson=$id;
		$this->person->idnationality=$_POST["idnationality"];
		$this->person->idethnicity=$_POST["idethnicity"];
		$this->person->idcharge=$_POST["idcharge"];
		$this->person->identification_card=$_POST["identification_card"];
		if($_POST["add_img"]){
			$tipo = explode("image/",$_FILES['image']['type']);
			if($tipo[1]=='gif' OR $tipo[1]=='jpg' OR $tipo[1]=='png' OR $tipo[1]=='jpeg'){
				$name = 'uploads/people/'.$_POST["idnationality"].$_POST["identification_card"].date("YmdHis").".".$tipo[1];
				move_uploaded_file($_FILES['image']['tmp_name'], $name);
				$this->person->image = $name;
				if($this->person->idperson==$_SESSION["idperson"]){
					$_SESSION["image"] = ($name != "")? $name : "img/default.png";
				}
			}else{
				$this->person->image = $_POST["image_url"];
				if($this->person->idperson==$_SESSION["idperson"]){
					$_SESSION["image"] = $_POST["image_url"];
				}
			}
		}else{
			$this->person->image = "";
			if($this->person->idperson==$_SESSION["idperson"]){
				$_SESSION["image"] = "img/default.png";
			}
			if(!empty($_POST["image_url"])){
				unlink($_POST["image_url"]);	
			}
		}
		$this->person->name_one=ucwords($_POST["name_one"]);
		$this->person->name_two=ucwords($_POST["name_two"]);
		$this->person->last_name_one=ucwords($_POST["last_name_one"]);
		$this->person->last_name_two=ucwords($_POST["last_name_two"]);
		$this->person->sex=$_POST["sex"];
		$this->person->email=$_POST["email"];
		$birth_date = explode('-',$_POST["birth_date"]);
		$this->person->birth_date = $birth_date[2].'-'.$birth_date[1].'-'.$birth_date[0];
		$this->person->birth_place=$_POST["birth_place"];
		$this->person->idaddress=$_POST["idaddress"];
		$this->person->address=$_POST["address"];
		$this->person->phone_one=$_POST["phone_one"];
		$this->person->phone_two=$_POST["phone_two"];
	}
	public function listt(){
		echo json_encode($this->person->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->person->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,14,$_SESSION["msj"],"{".id.":'',".person_idnationality.":'".$_POST["idnationality"]."',".person_idethnicity.":'".$_POST["idethnicity"]."',".person_charge.":'".$_POST["idcharge"]."',".person_identification_card.":'".$_POST["identification_card"]."',".person_image.":'".$_POST["image"]."',".person_name_one.":'".$_POST["name_one"]."',".person_name_two.":'".$_POST["name_two"]."',".person_last_name_one.":'".$_POST["last_name_one"]."',".person_last_name_two.":'".$_POST["last_name_two"]."',".person_sex.":'".$_POST["sex"]."',".person_email.":'".$_POST["email"]."',".person_birth_date.":'".$birth_date."',".person_birth_place.":'".$_POST["birth_place"]."',".person_idaddress.":'".$_POST["idaddress"]."',".person_address.":'".$_POST["address"]."',".person_phone_one.":'".$_POST["phone_one"]."',".person_phone_two.":'".$_POST["phone_two"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->person->dependencies();
		view("person.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->person->idperson=$id;
		$data["d"] = $this->person->query();
		$data["dependencies"] = $this->person->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,14,query,"{".id.":'".$id."'}");
		view("person.php",1,$data);	
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->person->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,14,$_SESSION["msj"],"{".id.":'".$id."',".person_idnationality.":'".$_POST["idnationality"]."',".person_idethnicity.":'".$_POST["idethnicity"]."',".person_charge.":'".$_POST["idcharge"]."',".person_identification_card.":'".$_POST["identification_card"]."',".person_image.":'".$_POST["image"]."',".person_name_one.":'".$_POST["name_one"]."',".person_name_two.":'".$_POST["name_two"]."',".person_last_name_one.":'".$_POST["last_name_one"]."',".person_last_name_two.":'".$_POST["last_name_two"]."',".person_sex.":'".$_POST["sex"]."',".person_email.":'".$_POST["email"]."',".person_birth_date.":'".$birth_date."',".person_birth_place.":'".$_POST["birth_place"]."',".person_idaddress.":'".$_POST["idaddress"]."',".person_address.":'".$_POST["address"]."',".person_phone_one.":'".$_POST["phone_one"]."',".person_phone_two.":'".$_POST["phone_two"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->person->idperson=$id;
		$_SESSION["msj"] = ($this->person->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,14,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->person->idperson=$id;
		$_SESSION["msj"] = ($this->person->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,14,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->person->idperson=$id;
		$_SESSION["msj"] = ($this->person->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,14,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],person,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$persons = $this->person->pdf();
		require 'pdf/personPdf.php';
	}
}
?>