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
		$this->db->prepare("SELECT lr.idlog_report,u.name,lr.report,lr.code,DATE_FORMAT(lr.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created,(SELECT count(*) FROM ".PREFIX."tlog_report) as countx FROM ".PREFIX."tlog_report lr INNER JOIN ".PREFIX."tuser u ON lr.iduser=u.iduser WHERE CAST(lr.idlog_report as CHAR) LIKE '%$search%' OR u.name LIKE '%$search%' OR lr.report LIKE '%$search%' OR lr.code LIKE '%$search%' ORDER BY lr.idlog_report DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idlog_report"] = $val["idlog_report"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["report"] = $val["report"];
			$d["data"][$key]["code"] = $val["code"];
			$d["data"][$key]["date_created"] = $val["date_created"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idlog_report"],$val["status"],3);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function add($iduser,$report,$code){
		$this->db->prepare("INSERT INTO ".PREFIX."tlog_report (iduser,report,code,date_created) VALUES (?,?,?,NOW());");
		return $this->db->execute(array($iduser,$report,$code));
	}
	public function pdf(){
		$this->db->prepare("SELECT lr.idlog_report,u.name,lr.report,lr.code,DATE_FORMAT(lr.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM ".PREFIX."tlog_report lr INNER JOIN tuser u ON lr.iduser=u.iduser ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function graph(){
		$this->db->prepare("SELECT count(*) as countx,report FROM ".PREFIX."tlog_report GROUP BY idlog_report");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;	
	}
}
?>