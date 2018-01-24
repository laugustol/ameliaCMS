<?php
namespace Models;
class log_movementModel{
	private $db,$permission;
	public $idlog_movement,$iduser,$idaction,$idservice,$message,$data;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){
		$this->db->prepare("SELECT lm.idlog_movement,u.name as uname,a.name as aname,s.name as sname,lm.message,lm.data,DATE_FORMAT(lm.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM ".PREFIX."tlog_movement lm INNER JOIN ".PREFIX."tuser u ON lm.iduser=u.iduser INNER JOIN ".PREFIX."taction a ON lm.idaction=a.idaction INNER JOIN ".PREFIX."tservice s ON lm.idservice=s.idservice ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idlog_movement"] = $val["idlog_movement"];
			$d[$key]["uname"] = $val["uname"];
			$d[$key]["aname"] = $val["aname"];
			$d[$key]["sname"] = $val["sname"];
			$d[$key]["message"] = $val["message"];
			$d[$key]["data"] = $val["data"];
			$d[$key]["date_created"] = $val["date_created"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idlog_movement"],$val["status"],3);
		}
		return $d;
	}
	public function add($iduser,$idaction,$idservice,$message,$data=""){
		$this->db->prepare("INSERT INTO ".PREFIX."tlog_movement (iduser,idaction,idservice,message,data,date_created) VALUES (?,?,?,?,?,NOW());");
		return $this->db->execute(array($iduser,$idaction,$idservice,$message,$data));
	}
	public function pdf(){
		$this->db->prepare("SELECT lm.idlog_movement,u.name as uname,a.name as aname,s.name as sname,lm.message,lm.data,DATE_FORMAT(lm.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM ".PREFIX."tlog_movement lm INNER JOIN ".PREFIX."tuser u ON lm.iduser=u.iduser INNER JOIN ".PREFIX."taction a ON lm.idaction=a.idaction INNER JOIN ".PREFIX."tservice s ON lm.idservice=s.idservice ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function graph(){
		$this->db->prepare("SELECT count(*) as countx,a.name FROM ".PREFIX."tlog_movement l INNER JOIN ".PREFIX."taction a ON l.idaction=a.idaction GROUP BY l.idaction ORDER BY l.idaction");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;	
	}
}
?>