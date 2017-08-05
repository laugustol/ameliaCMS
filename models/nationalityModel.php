<?php
namespace Models;
class nationalityModel{
	private $db,$permission;
	public $idnationality,$name_one,$name_two,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT * FROM tnationality WHERE idnationality LIKE '%$search%' OR name_one LIKE '%$search%' OR name_two LIKE '%$search%' ORDER BY idnationality DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idnationality"] = $val["idnationality"];
			$d["data"][$key]["name_one"] = $val["name_one"];
			$d["data"][$key]["name_two"] = $val["name_two"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idnationality"],$val["status"]);
		}
		$this->db->prepare("SELECT count(*) FROM tnationality");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tnationality WHERE idnationality LIKE '%$search%' OR name_one LIKE '%$search%' OR name_two LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO tnationality (name_one,name_two,status) VALUES (?,?,'1');");
		return $this->db->execute(array($this->name_one,$this->name_two));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM tnationality WHERE idnationality=? ;");
		$data=$this->db->execute(array($this->idnationality));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE tnationality SET name_one=?,name_two=? WHERE idnationality=?;");
		return $this->db->execute(array($this->name_one,$this->name_two,$this->idnationality));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM tnationality WHERE idnationality=?;");
		return $this->db->execute(array($this->idnationality));
	}
	public function status($num){
		$this->db->prepare("UPDATE tnationality SET status=? WHERE idnationality=?;");
		return $this->db->execute(array($num,$this->idnationality));
	}
	public function pdf(){
		$this->db->prepare("SELECT * FROM tnationality ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search($value){
		$this->db->prepare("SELECT idnationality,CONCAT(name_one,' ',name_two) FROM tnationality WHERE name_one LIKE '%$value%' OR name_two LIKE '%$value%' AND status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>