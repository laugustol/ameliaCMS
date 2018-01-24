<?php
namespace Models;
class log_reportModel{
	private $db,$permission;
	public $idlog_report,$iduser,$idaction,$idservice,$message,$data;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){		
		$this->db->prepare("SELECT lr.idlog_report,u.name,lr.report,lr.code,DATE_FORMAT(lr.date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM ".PREFIX."tlog_report lr INNER JOIN ".PREFIX."tuser u ON lr.iduser=u.iduser ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idlog_report"] = $val["idlog_report"];
			$d[$key]["name"] = $val["name"];
			$d[$key]["report"] = $val["report"];
			$d[$key]["code"] = $val["code"];
			$d[$key]["date_created"] = $val["date_created"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idlog_report"],$val["status"],3);
		}
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