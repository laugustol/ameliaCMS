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
		$this->db->prepare("SELECT lm.idlog_movement,u.name as uname,a.name as aname,s.name as sname,lm.message,lm.data,DATE_FORMAT(lm.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created,(SELECT count(*) FROM ".PREFIX."tlog_movement) as countx FROM ".PREFIX."tlog_movement lm INNER JOIN ".PREFIX."tuser u ON lm.iduser=u.iduser INNER JOIN ".PREFIX."taction a ON lm.idaction=a.idaction INNER JOIN ".PREFIX."tservice s ON lm.idservice=s.idservice WHERE lm.idlog_movement LIKE '%$search%' OR u.name LIKE '%$search%' OR a.name LIKE '%$search%' OR s.name LIKE '%$search%' OR lm.message OR lm.date_created LIKE '%$search%' ORDER BY lm.idlog_movement DESC LIMIT $start,$length ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idlog_movement"] = $val["idlog_movement"];
			$d["data"][$key]["uname"] = $val["uname"];
			$d["data"][$key]["aname"] = $val["aname"];
			$d["data"][$key]["sname"] = $val["sname"];
			$d["data"][$key]["message"] = $val["message"];
			$d["data"][$key]["data"] = $val["data"];
			$d["data"][$key]["date_created"] = $val["date_created"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idlog_movement"],$val["status"],3);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
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
}
?>