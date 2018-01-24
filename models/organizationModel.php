<?php
namespace Models;
class organizationModel{
	private $db,$permission;
	public $idorganization,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){
		$this->db->prepare("SELECT * FROM ".PREFIX."torganization ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idorganization"] = $val["idorganization"];
			$d[$key]["name_two"] = $val["name_two"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idorganization"],$val["status"]);
		}
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."torganization (name_one,name_two,email,description,idgallery_header,idgallery_favicon,address,rights,phone_one,phone_two,phone_three,skip_homepage,type_web,number_question_answer,login,new_password_sent_email,email_host,email_port,email_security_smtp,email_type_security_smtp,email_user,email_password,email_subject,email_message,number_days_password_diferrence,number_answer_allowed,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1);");
		return $this->db->execute(array($this->name_one,$this->name_two,$this->email,$this->description,$this->idgallery_header,$this->idgallery_favicon,$this->address,$this->rights,$this->phone_one,$this->phone_two,$this->phone_three,$this->skip_homepage,$this->type_web,$this->number_question_answer,$this->login,$this->new_password_sent_email,$this->email_host,$this->email_port,$this->email_security_smtp,$this->email_type_security_smtp,$this->email_user,$this->email_password,$this->email_subject,$this->email_message,$this->number_days_password_diferrence,$this->number_answer_allowed));
	}
	public function query(){
		$this->db->prepare("SELECT o.idorganization,o.name_one,o.name_two,o.email,o.description,g1.idgallery as idgallery_header,g1.src as src_header,g2.idgallery as idgallery_favicon,g2.src as src_favicon,o.address,o.rights,o.phone_one,o.phone_two,o.phone_three,o.skip_homepage,o.type_web,o.number_question_answer,o.login,o.new_password_sent_email,o.email_host,o.email_port,o.email_security_smtp,o.email_type_security_smtp,o.email_user,o.email_password,o.email_subject,o.email_message,o.number_days_password_diferrence,o.number_answer_allowed FROM ".PREFIX."torganization o LEFT JOIN ".PREFIX."tgallery g1 ON o.idgallery_header=g1.idgallery LEFT JOIN ".PREFIX."tgallery g2 ON o.idgallery_favicon=g2.idgallery WHERE idorganization=?;");
		$data=$this->db->execute(array($this->idorganization));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function query_status(){
		$this->db->prepare("SELECT o.idorganization,o.name_one,o.name_two,o.email,o.description,g1.idgallery as idgallery_header,g1.src as src_header,g2.idgallery as idgallery_favicon,g2.src as src_favicon,o.address,o.rights,o.phone_one,o.phone_two,o.phone_three,o.skip_homepage,o.type_web,o.number_question_answer,o.login,o.new_password_sent_email,o.email_host,o.email_port,o.email_security_smtp,o.email_type_security_smtp,o.email_user,o.email_password,o.email_subject,o.email_message,o.number_days_password_diferrence,o.number_answer_allowed FROM ".PREFIX."torganization o LEFT JOIN ".PREFIX."tgallery g1 ON o.idgallery_header=g1.idgallery LEFT JOIN ".PREFIX."tgallery g2 ON o.idgallery_favicon=g2.idgallery WHERE status='1';");
		$data=$this->db->execute(array());
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."torganization SET name_one=?,name_two=?,email=?,description=?,idgallery_header=?,idgallery_favicon=?,address=?,rights=?,phone_one=?,phone_two=?,phone_three=?,skip_homepage=?,type_web=?,number_question_answer=?,login=?,new_password_sent_email=?,email_host=?,email_port=?,email_security_smtp=?,email_type_security_smtp=?,email_user=?,email_password=?,email_subject=?,email_message=?,number_days_password_diferrence=?,number_answer_allowed=? WHERE idorganization=?");
		return $this->db->execute(array($this->name_one,$this->name_two,$this->email,$this->description,$this->idgallery_header,$this->idgallery_favicon,$this->address,$this->rights,$this->phone_one,$this->phone_two,$this->phone_three,$this->skip_homepage,$this->type_web,$this->number_question_answer,$this->login,$this->new_password_sent_email,$this->email_host,$this->email_port,$this->email_security_smtp,$this->email_type_security_smtp,$this->email_user,$this->email_password,$this->email_subject,$this->email_message,$this->number_days_password_diferrence,$this->number_answer_allowed,$this->idorganization));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."torganization WHERE idorganization=?;");
		return $this->db->execute(array($this->idorganization));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."torganization SET status=? WHERE idorganization=?;");
		return $this->db->execute(array($num,$this->idorganization));
	}
	public function pdf(){
		$this->db->prepare("SELECT * FROM ".PREFIX."torganization ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>