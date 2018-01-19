<?php
namespace controllers;
class userController{
	private $user,$person,$permission,$log_movement;
	public function __construct(){
		define("controller","user");
		$this->user = new \models\userModel;
		$this->person = new \models\personModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,15,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->user->dependencies();
		view("user.php",1,$data);
	}
	public function data($id=""){
		$this->user->iduser=$id;
		$this->user->idperson= $_POST["idperson"];
		$this->user->idcharge=$_POST["idcharge"];
		$this->user->name=$_POST["name"];
		$this->user->password=$_POST["password"];
		$this->user->note=$_POST["note"];

		$this->person->idperson=$_SESSION["idperson"];
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
				if($this->user->iduser == $_SESSION["iduser"]){
					$_SESSION["image"] = ($name != "")? $name : (($_SESSION['sex']=='M')? "img/male.png" : "img/female.png");
				}
			}else{
				$this->person->image = $_POST["image_url"];
				if($this->user->iduser == $_SESSION["iduser"]){
					$_SESSION["image"] = $_POST["image_url"];
				}
			}
		}else if(isset($_POST["add_img"])){
			$this->person->image = "";
			if($this->user->iduser == $_SESSION["iduser"]){
				$_SESSION["image"] = (($_SESSION['sex']=='M')? "img/male.png" : "img/female.png");
			}
			unlink($_POST["image_url"]);
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
		$this->person->address=$_POST["address"];
		$this->person->phone_one=$_POST["phone_one"];
		$this->person->phone_two=$_POST["phone_two"];
	}
	public function listt(){
		echo json_encode($this->user->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function note(){
		$this->data($_SESSION["iduser"]);
		$this->user->note();
		header("location: ".url_base."dashboard");
		exit;
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->user->add())? add_user_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,15,$_SESSION["msj"],"{".id.":'',".user_person.":'".$_POST["idperson"]."',".user_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->user->dependencies();
		view("user.php",1,$data);
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->user->iduser=$id;
		$data["d"] = $this->user->query();
		$data["dependencies"] = $this->user->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,15,query,"{".id.":'".$id."'}");
		view("user.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->user->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,15,$_SESSION["msj"],"{".id.":'',".user_person.":'".$_POST["idperson"]."',".user_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function reset_password($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->user->reset_password())? user_reset_password_success : user_reset_password_error;
			$this->log_movement->add($_SESSION["iduser"],2,15,$_SESSION["msj"],"{".id.":'',".user_person.":'".$_POST["idperson"]."',".user_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->user->iduser=$id;
		$_SESSION["msj"] = ($this->user->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,15,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->user->iduser=$id;
		$_SESSION["msj"] = ($this->user->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,15,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->user->iduser=$id;
		$_SESSION["msj"] = ($this->user->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,15,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],user,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$users = $this->user->pdf();
		require 'pdf/userPdf.php';
	}
	public function profile(){
		if(isset($_POST["event"])){
			$this->data($_SESSION["iduser"]);
			$_SESSION["msj"] = ($this->person->edit())? edit_success : edit_error;
			header("location: ".url_base."profile");
			exit;
		}
		$this->user->iduser=$_SESSION["iduser"];
		$data["d"] = $this->user->query_profile();
		$data["dependencies"] = $this->user->dependencies();
		view("profile.php",1,$data);
	}
	public function initiated(){
		$this->data($_SESSION["iduser"]);
		if(isset($_POST["event"])){
			$aux=true;
			if($this->user->del_question_answer()){
				foreach($_POST["questions"] as $k1 => $question) {
					if($question!="" && $_POST["answers"][$k1]!=""){
						$this->user->question=$question;
						$this->user->answer=$_POST["answers"][$k1];
						if(!$this->user->add_question_answer()){
							$aux=false;
							break;
						}
					}else{
						$aux=false;
						break;
					}
				}
				if($aux){
					if($_POST["password"]!="" && $_POST["password_repeat"]!=""){
						if($_POST["password"] == $_POST["password_repeat"]){
							if($this->user->new_password()){
								if($this->user->initiated()){
									$_SESSION["initiated"]='1';
									$_SESSION["msj"] = edit_success;
								}else{
									$_SESSION["msj"] = edit_error;
								}
							}else{
								$_SESSION["msj"] = password_error;
							}
						}else{
							$_SESSION["msj"] = password_error;
						}
					}else{
						$_SESSION["msj"] = password_error;
					}
				}
			}
		}
		header("location: ".url_base."profile");
		exit;
	}
	public function query_questions_answers(){
		$this->user->name=$_POST["name"];
		echo json_encode($this->user->query_questions_answers());
	}
	public function required_password(){
		$this->user->iduser=$_SESSION["iduser"];
		echo ($this->user->required_password() == crypt($_POST["password"],$this->user->required_password()))? 1 : 0;
	}
	public function new_password(){
		if(isset($_POST["event"])){
			$this->data($_SESSION["iduser"]);
			if($_POST["password"]!="" && $_POST["password_repeat"]!=""){
				if($_POST["password"] == $_POST["password_repeat"]){
					$_SESSION["msj"] = ($this->user->new_password())? password_success : password_error;
				}else{
					$_SESSION["msj"] = password_error;
				}
			}else{
				$_SESSION["msj"] = password_error;
			}
		}
		header("location: ".url_base.controller."/profile");
		exit;
	}
	public function question_answer(){
		$this->user->iduser=$_SESSION["iduser"];
		if(isset($_POST["event"])){
			if($this->user->del_question_answer()){
				foreach($_POST["questions"] as $k1 => $question) {
					if($question!="" && $_POST["answers"][$k1]!=""){
						$this->user->question=$question;
						$this->user->answer=$_POST["answers"][$k1];
						if($this->user->add_question_answer()){
							$_SESSION["msj"] = edit_success;
						}else{
							$_SESSION["msj"] = edit_error;
							break;
						}
					}else{
						$_SESSION["msj"] = edit_error;
						break;
					}
				}
			}
		}
		header("location: ".url_base."profile");
		exit;
	}
}
?>