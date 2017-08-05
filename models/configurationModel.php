<?php
namespace Models;
class configurationModel{
	private $db;
	public $number_question_answer,$login,$new_password_sent_email,$email_host,$email_port,$email_security_smtp,$email_type_security_smtp,$email_user,$email_password,$email_subject,$email_message,$number_days_password_diferrence,$number_answer_allowed;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function query(){
		$this->db->prepare("SELECT * FROM tconfiguration;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE tconfiguration SET number_question_answer=?,login=?,new_password_sent_email=?,email_host=?,email_port=?,email_security_smtp=?,email_type_security_smtp=?,email_user=?,email_password=?,email_subject=?,email_message=?,number_days_password_diferrence=?,number_answer_allowed=?");
		return $this->db->execute(array($this->number_question_answer,$this->login,$this->new_password_sent_email,$this->email_host,$this->email_port,$this->email_security_smtp,$this->email_type_security_smtp,$this->email_user,$this->email_password,$this->email_subject,$this->email_message,$this->number_days_password_diferrence,$this->number_answer_allowed));
	}
}
?>