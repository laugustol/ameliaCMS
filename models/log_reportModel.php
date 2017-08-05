<?php
namespace Models;
class log_reportModel{
	private $db,$permission;
	public $idlog_report,$iduser,$idaction,$idservice,$message,$data;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT lr.idlog_report,u.name,lr.report,lr.code,DATE_FORMAT(lr.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM tlog_report lr INNER JOIN tuser u ON lr.iduser=u.iduser WHERE lr.idlog_report LIKE '%$search%' OR u.name LIKE '%$search%' OR lr.report OR lr.code LIKE '%$search%' ORDER BY lr.idlog_report DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idlog_report"] = $val["idlog_report"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["report"] = $val["report"];
			$d["data"][$key]["code"] = $val["code"];
			$d["data"][$key]["date_created"] = $val["date_created"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idlog_report"],$val["status"],3);
		}
		$this->db->prepare("SELECT count(*) FROM tlog_report");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tlog_report lr INNER JOIN tuser u ON lr.iduser=u.iduser WHERE lr.idlog_report LIKE '%$search%' OR u.name LIKE '%$search%' OR lr.report OR lr.code LIKE '%$search%' ORDER BY lr.idlog_report DESC LIMIT $start,$length ");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function add($iduser,$report,$code){
		$this->db->prepare("INSERT INTO tlog_report (iduser,report,code,date_created) VALUES (?,?,?,NOW());");
		return $this->db->execute(array($iduser,$report,$code));
	}
	public function pdf(){
		$this->db->prepare("SELECT lr.idlog_report,u.name,lr.report,lr.code,DATE_FORMAT(lr.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM tlog_report lr INNER JOIN tuser u ON lr.iduser=u.iduser ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>