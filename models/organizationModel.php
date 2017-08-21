<?php
namespace Models;
class organizationModel{
	private $db;
	public $name_one,$name_two,$email,$description,$idgallery_header,$idgallery_favicon,$address,$rights,$phone_one,$phone_two,$phone_three,$number_question_answer,$login,$new_password_sent_email,$email_host,$email_port,$email_security_smtp,$email_type_security_smtp,$email_user,$email_password,$email_subject,$email_message,$number_days_password_diferrence,$number_answer_allowed;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function query(){
		$this->db->prepare("SELECT o.name_one,o.name_two,o.email,o.description,g1.idgallery as idgallery_header,g1.src as src_header,g2.idgallery as idgallery_favicon,g2.src as src_favicon,o.address,o.rights,o.phone_one,o.phone_two,o.phone_three,o.number_question_answer,o.login,o.new_password_sent_email,o.email_host,o.email_port,o.email_security_smtp,o.email_type_security_smtp,o.email_user,o.email_password,o.email_subject,o.email_message,o.number_days_password_diferrence,o.number_answer_allowed FROM ".PREFIX."torganization o LEFT JOIN ".PREFIX."tgallery g1 ON o.idgallery_header=g1.idgallery LEFT JOIN ".PREFIX."tgallery g2 ON o.idgallery_favicon=g2.idgallery;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."torganization SET name_one=?,name_two=?,email=?,description=?,idgallery_header=?,idgallery_favicon=?,address=?,rights=?,phone_one=?,phone_two=?,phone_three=?,number_question_answer=?,login=?,new_password_sent_email=?,email_host=?,email_port=?,email_security_smtp=?,email_type_security_smtp=?,email_user=?,email_password=?,email_subject=?,email_message=?,number_days_password_diferrence=?,number_answer_allowed=?");
		return $this->db->execute(array($this->name_one,$this->name_two,$this->email,$this->description,$this->idgallery_header,$this->idgallery_favicon,$this->address,$this->rights,$this->phone_one,$this->phone_two,$this->phone_three,$this->number_question_answer,$this->login,$this->new_password_sent_email,$this->email_host,$this->email_port,$this->email_security_smtp,$this->email_type_security_smtp,$this->email_user,$this->email_password,$this->email_subject,$this->email_message,$this->number_days_password_diferrence,$this->number_answer_allowed));
	}
}
?>