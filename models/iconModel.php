<?php
namespace Models;
class iconModel{
	private $db,$permission;
	public $idicon,$class,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT * FROM ticon WHERE idicon LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idicon DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idicon"] = $val["idicon"];
			$d["data"][$key]["class"] = $val["class"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idicon"],$val["status"]);
		}
		$this->db->prepare("SELECT count(*) FROM ticon");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM ticon WHERE idicon LIKE '%$search%' OR name LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function dependencies(){
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ticon (class,name,status) VALUES (?,?,'1');");
		return $this->db->execute(array($this->class,$this->name,$this->idicon));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ticon WHERE idicon=? ;");
		$data=$this->db->execute(array($this->idicon));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ticon SET class=?,name=? WHERE idicon=?;");
		return $this->db->execute(array($this->class,$this->name,$this->idicon));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ticon WHERE idicon=?;");
		return $this->db->execute(array($this->idicon));
	}
	public function status($num){
		$this->db->prepare("UPDATE ticon SET status=? WHERE idicon=?;");
		return $this->db->execute(array($num,$this->idicon));
	}
}
?>