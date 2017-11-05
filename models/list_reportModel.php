<?php
namespace Models;
class list_reportModel{
	private $db;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function query(){
		$this->db->prepare("SELECT s.url,s.name FROM ".PREFIX."tservice s INNER JOIN ".PREFIX."tdcharge_service_action csa ON s.idservice=csa.idservice INNER JOIN ".PREFIX."taction a ON csa.idaction=a.idaction WHERE csa.idcharge='".$_SESSION["idcharge"]."' AND a.function='6'");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>