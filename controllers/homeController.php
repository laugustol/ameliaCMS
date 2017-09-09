<?php
namespace controllers;
class homeController{
	private $user,$log_access,$mailer;
	public function __construct(){
		$this->user = new \Models\userModel;
		$this->log_access = new \Models\log_accessModel;
	}
	public function index(){
		view("index.php",2);
	}
	public function login(){
		if(isset($_POST["user"]) && isset($_POST["password"])){
			//RESET Model problem login connect db production != test
			$_SESSION["environment"] = $_POST["environment"];
			$this->user = new \Models\userModel;
			$this->user->name=$_POST["user"];
			$this->user->password=$_POST["password"];
			$val=$this->user->login();
			if($val == '1'){
				$this->log_access->add($_POST["user"],login_success);
			}else if($val=='2'){
				$msj = explode(",", login_error);
				$msj = explode("'",$msj[0]);
				$this->log_access->add($_POST["user"],$msj[1]);
				$_SESSION["msj"] = login_error;
			}else if($val=='3'){
				$msj = explode(",", login_locked);
				$msj = explode("'",$msj[0]);
				$this->log_access->add($_POST["user"],$msj[1]);
				$_SESSION["msj"] = login_locked;
			}
			header("location: ".url_base."home/login");
		}else if(isset($_SESSION["uname"])){
			if($_SESSION["initiated"]=="1"){
				header("location: ".url_base."home/dashboard");
			}else{
				header("location: ".url_base."user/profile");
			}
		}else{
			view("login.php",3);
		}
	}
	public function forgot_password(){
		if(isset($_POST["user"]) && isset($_POST["answers"])){
			$this->user->name = $_POST["user"];
			$cfg = $this->user->dependencies();
			foreach ($_POST["answers"] as $k1 => $answer) {
				$this->user->answer[$k1] = $answer;
			}
			if($this->user->forgot_password()){
				if($cfg["configuration"][0]["new_password_sent_email"]=='1'){
					$_SESSION["msj"] = forgot_password_alert_password_email_success;
				}else{
					$_SESSION["msj"] = forgot_password_alert_password_success;
				}
			}else{
				$_SESSION["msj"] = forgot_password_alert_password_error;
			}
			header("location: ".url_base."home/forgot_password");
			exit;
		}else{
			view("forgot_password.php",3);
		}
	}
	public function dashboard(){
		$this->user->iduser = $_SESSION["iduser"];
		$data["dependencies"]["note"] = $this->user->query_note();
		view("dashboard.php",1,$data);
	}
	public static function e404(){
		view("error404.php",3);
	}
	public function logout(){
		unset($_SESSION["iduser"]);
		unset($_SESSION["idperson"]);
		unset($_SESSION["uname"]);
		unset($_SESSION["cname"]);
		unset($_SESSION["image"]);
		unset($_SESSION["pename_one"]);
		unset($_SESSION["pelast_name_one"]);
		unset($_SESSION["title"]);
		unset($_SESSION["environment"]);
		unset($_SESSION["DATABASE"]);
		header("location: ".url_base);
	}
}
?>