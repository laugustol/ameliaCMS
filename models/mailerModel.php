<?php
namespace Models;
require 'third_party/PHPMailer/PHPMailerAutoload.php';
class mailerModel{
	private $db,$configuration,$mailer;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->configuration = new \models\configurationModel;
		$this->mailer = new PHPMailer;
	}
	public function send_password(){
		$cfg = $this->configuration->query();
		$this->mailer->Host = $cfg["email_host"];
		$this->mailer->Port = $cfg["email_port"];
		if($cfg["email_security_smtp"]=='1'){
			$this->mailer->SMTPAuth = $cfg["email_security_smtp"]=='1'? True : False;
			$this->mailer->SMTPSecure = $cfg["email_type_security_smtp"];
		}
		$this->mailer->Username = $cfg["email_user"];
		$this->mailer->Password = $cfg["email_password"];
		$this->mailer->Subject = $cfg["email_subject"];
		$this->mailer->Body = $cfg["email_message"];
		if(!$this->mailer->send()){
			echo 'Message could not be sent.';
    		echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
		}else{
			echo 'Message has been sent';
		}
	}
}
?>