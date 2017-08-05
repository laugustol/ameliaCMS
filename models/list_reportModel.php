<?php
namespace Models;
class list_reportModel{
	private $db;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function query(){
		$this->db->prepare("SELECT s.url,s.name FROM tservice s INNER JOIN tduser_service_action usa ON s.idservice=usa.idservice INNER JOIN taction a ON usa.idaction=a.idaction WHERE usa.iduser='1' AND a.function='6'");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>