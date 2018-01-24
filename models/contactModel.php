<?php
namespace Models;
class contactModel{
	private $db,$permission;
	public $idcontact,$name,$email,$phone,$message,$iduser,$response,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){		
		$this->db->prepare("SELECT * FROM ".PREFIX."tcontact ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idcontact"] = $val["idcontact"];
			$d[$key]["email"] = $val["email"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idcontact"],$val["status"]);
			$d[$key]["status"] = ($val["status"])? contact_status_1 : contact_status_0 ;
		}
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tcontact (name,email,phone,message,status) VALUES (?,?,?,?,'0');");
		return $this->db->execute(array($this->name,$this->email,$this->phone,$this->message));
	}
	public function query(){
		$this->db->prepare("SELECT c.idcontact,c.name,c.email,c.phone,c.message,u.name as uname,c.response FROM ".PREFIX."tcontact c LEFT JOIN ".PREFIX."tuser u ON c.iduser=u.iduser WHERE c.idcontact=? ;");
		$data=$this->db->execute(array($this->idcontact));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("SELECT email FROM ".PREFIX."tcontact WHERE idcontact=? ;");
		$this->db->execute(array($this->idcontact));
		$d = $this->db->fetchAll()[0];
		$this->db->prepare("SELECT name_one,number_answer_allowed,new_password_sent_email,email_host,email_port,email_security_smtp,email_type_security_smtp,email_user,email_password,email_subject,email_message FROM ".PREFIX."torganization ;");
		$this->db->execute();
		$cfg = $this->db->fetchAll()[0];
		if($cfg["new_password_sent_email"]=="1"){
			require 'third_party/PHPMailer/PHPMailerAutoload.php';
			$this->mailer = new \PHPMailer;
			$this->mailer->Host = $cfg["email_host"];
			$this->mailer->Port = $cfg["email_port"];
			$this->mailer->IsSMTP();
			if($cfg["email_security_smtp"]=='1'){
				$this->mailer->SMTPAuth = True;
				$this->mailer->SMTPSecure = $cfg["email_type_security_smtp"];
			}else{
				$this->mailer->SMTPAuth = False;
			}
			$this->mailer->Username = $cfg["email_user"];
			$this->mailer->Password = $cfg["email_password"];
			$this->mailer->from = $cfg["email_user"];
			$this->mailer->FromName = $cfg["name_one"];
			$this->mailer->SMTPDebug = 2;
			$this->mailer->AddAddress($d["email"]);
			$this->mailer->Subject = contact_subject;
			$this->mailer->Body = $this->response;
			if(!$this->mailer->send()){
	    		echo 'Mailer Error: ' . $this->mailer->ErrorInfo;	    		
	    		return false;
			}

		}
		$this->db->prepare("UPDATE ".PREFIX."tcontact SET iduser=?,response=?,status='1' WHERE idcontact=?;");
		return $this->db->execute(array($this->iduser,$this->response,$this->idcontact));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tcontact WHERE idcontact=?;");
		return $this->db->execute(array($this->idcontact));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tcontact SET status=? WHERE idcontact=?;");
		return $this->db->execute(array($num,$this->idcontact));
	}
}
?>