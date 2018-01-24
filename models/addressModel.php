<?php
namespace Models;
class addressModel{
	private $db,$permission;
	public $idaddress,$idfather,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($controller){
		if($controller == "country"){
			$sql1 = "SELECT c.idaddress,c.name,c.status FROM ".PREFIX."taddress c ";
		}else if($controller == "state"){
			$sql1 = "SELECT s.idaddress,s.name,c.name as father,s.status FROM ".PREFIX."taddress c INNER JOIN ".PREFIX."taddress s ON c.idaddress=s.idfather ";
		}else if($controller == "municipality"){
			$sql1 = "SELECT m.idaddress,m.name,s.name as father,m.status FROM ".PREFIX."taddress c INNER JOIN ".PREFIX."taddress s ON c.idaddress=s.idfather INNER JOIN ".PREFIX."taddress m ON s.idaddress=m.idfather ";
		}else if($controller == "parish"){
			$sql1 = "SELECT p.idaddress,p.name,m.name as father,p.status FROM ".PREFIX."taddress c INNER JOIN ".PREFIX."taddress s ON c.idaddress=s.idfather INNER JOIN ".PREFIX."taddress m ON s.idaddress=m.idfather INNER JOIN ".PREFIX."taddress p ON m.idaddress=p.idfather ";
		}
		$this->db->prepare($sql1);
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idaddress"] = $val["idaddress"];
			$d[$key]["name"] = $val["name"];
			$d[$key]["father"] = $val["father"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idaddress"],$val["status"]);
		}
		return $d;
	}
	public function dependencies(){
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."taddress (idfather,name,status) VALUES (?,?,'1');");
		return $this->db->execute(array($this->idfather,$this->name));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."taddress WHERE idaddress=? ;");
		$data=$this->db->execute(array($this->idaddress));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."taddress SET idfather=?,name=? WHERE idaddress=?;");
		return $this->db->execute(array($this->idfather,$this->name,$this->idaddress));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."taddress WHERE idaddress=?;");
		return $this->db->execute(array($this->idaddress));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."taddress SET status=? WHERE idaddress=?;");
		return $this->db->execute(array($num,$this->idaddress));
	}
	public function pdf_country(){
		$this->db->prepare("SELECT c.idaddress,c.name,c.status FROM ".PREFIX."taddress c 
			WHERE c.idfather='0' ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function pdf_state(){
		$this->db->prepare("SELECT s.idaddress,s.name,c.name as father,s.status FROM ".PREFIX."taddress c 
			INNER JOIN ".PREFIX."taddress s ON c.idaddress=s.idfather
			WHERE c.idfather='0' ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function pdf_municipality(){
		$this->db->prepare("SELECT m.idaddress,m.name,s.name as father,m.status FROM ".PREFIX."taddress c 
			INNER JOIN ".PREFIX."taddress s ON c.idaddress=s.idfather
			INNER JOIN ".PREFIX."taddress m ON s.idaddress=m.idfather
			WHERE c.idfather='0' ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function pdf_parish(){
		$this->db->prepare("SELECT p.idaddress,p.name,m.name as father,p.status FROM ".PREFIX."taddress c 
					INNER JOIN ".PREFIX."taddress s ON c.idaddress=s.idfather
					INNER JOIN ".PREFIX."taddress m ON s.idaddress=m.idfather
					INNER JOIN ".PREFIX."taddress p ON m.idaddress=p.idfather WHERE c.idfather='0' ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search($value){
		$this->db->prepare("SELECT p.idaddress,CONCAT(p.name,' - ',m.name,' - ',s.name,' - ',c.name) FROM ".PREFIX."taddress p INNER JOIN ".PREFIX."taddress m ON p.idfather=m.idaddress INNER JOIN ".PREFIX."taddress s ON m.idfather=s.idaddress INNER JOIN ".PREFIX."taddress c ON s.idfather=c.idaddress WHERE (lower(p.name) LIKE lower('%$value%') OR lower(m.name) LIKE lower('%$value%')) AND p.status='1' AND m.status='1' AND s.status='1' AND c.status='1' ;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search_c($value){
		$this->db->prepare("SELECT c.idaddress,c.name FROM ".PREFIX."taddress p INNER JOIN ".PREFIX."taddress m ON p.idfather=m.idaddress INNER JOIN ".PREFIX."taddress s ON m.idfather=s.idaddress INNER JOIN ".PREFIX."taddress c ON s.idfather=c.idaddress WHERE lower(c.name) LIKE lower('%$value%') AND c.status='1' ;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search_s($value){
		$this->db->prepare("SELECT s.idaddress,CONCAT(s.name,' - ',c.name) FROM ".PREFIX."taddress p INNER JOIN ".PREFIX."taddress m ON p.idfather=m.idaddress INNER JOIN ".PREFIX."taddress s ON m.idfather=s.idaddress INNER JOIN ".PREFIX."taddress c ON s.idfather=c.idaddress WHERE lower(s.name) LIKE lower('%$value%') AND s.status='1' AND c.status='1' ;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search_m($value){
		$this->db->prepare("SELECT m.idaddress,CONCAT(m.name,' - ',s.name,' - ',c.name) FROM ".PREFIX."taddress p INNER JOIN ".PREFIX."taddress m ON p.idfather=m.idaddress INNER JOIN ".PREFIX."taddress s ON m.idfather=s.idaddress INNER JOIN ".PREFIX."taddress c ON s.idfather=c.idaddress WHERE lower(m.name) LIKE lower('%$value%') AND m.status='1' AND s.status='1' AND c.status='1' ;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>