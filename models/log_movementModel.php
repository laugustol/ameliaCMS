<?php
namespace Models;
class log_movementModel{
	private $db,$permission;
	public $idlog_movement,$iduser,$idaction,$idservice,$message,$data;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT lm.idlog_movement,u.name as uname,a.name as aname,s.name as sname,lm.message,lm.data,DATE_FORMAT(lm.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM tlog_movement lm INNER JOIN tuser u ON lm.iduser=u.iduser INNER JOIN taction a ON lm.idaction=a.idaction INNER JOIN tservice s ON lm.idservice=s.idservice WHERE lm.idlog_movement LIKE '%$search%' OR u.name LIKE '%$search%' OR a.name LIKE '%$search%' OR s.name LIKE '%$search%' OR lm.message OR lm.date_created LIKE '%$search%' ORDER BY lm.idlog_movement DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idlog_movement"] = $val["idlog_movement"];
			$d["data"][$key]["uname"] = $val["uname"];
			$d["data"][$key]["aname"] = $val["aname"];
			$d["data"][$key]["sname"] = $val["sname"];
			$d["data"][$key]["message"] = $val["message"];
			$d["data"][$key]["data"] = $val["data"];
			$d["data"][$key]["date_created"] = $val["date_created"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idlog_movement"],$val["status"],3);
		}
		$this->db->prepare("SELECT count(*) FROM tlog_movement");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tlog_movement lm INNER JOIN tuser u ON lm.iduser=u.iduser INNER JOIN taction a ON lm.idaction=a.idaction INNER JOIN tservice s ON lm.idservice=s.idservice WHERE lm.idlog_movement LIKE '%$search%' OR u.name LIKE '%$search%' OR a.name LIKE '%$search%' OR s.name LIKE '%$search%' OR lm.message OR lm.date_created LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function add($iduser,$idaction,$idservice,$message,$data=""){
		$this->db->prepare("INSERT INTO tlog_movement (iduser,idaction,idservice,message,data,date_created) VALUES (?,?,?,?,?,NOW());");
		return $this->db->execute(array($iduser,$idaction,$idservice,$message,$data));
	}
	public function pdf(){
		$this->db->prepare("SELECT lm.idlog_movement,u.name as uname,a.name as aname,s.name as sname,lm.message,lm.data,DATE_FORMAT(lm.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM tlog_movement lm INNER JOIN tuser u ON lm.iduser=u.iduser INNER JOIN taction a ON lm.idaction=a.idaction INNER JOIN tservice s ON lm.idservice=s.idservice ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>