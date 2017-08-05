<?php
namespace Models;
class ethnicityModel{
	private $db,$permission;
	public $idethnicity,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT * FROM tethnicity WHERE idethnicity LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idethnicity DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idethnicity"] = $val["idethnicity"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idethnicity"],$val["status"]);
		}
		$this->db->prepare("SELECT count(*) FROM tethnicity");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tethnicity WHERE idethnicity LIKE '%$search%' OR name LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO tethnicity (name,status) VALUES (?,'1');");
		return $this->db->execute(array($this->name));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM tethnicity WHERE idethnicity=? ;");
		$data=$this->db->execute(array($this->idethnicity));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE tethnicity SET name=? WHERE idethnicity=?;");
		return $this->db->execute(array($this->name,$this->idethnicity));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM tethnicity WHERE idethnicity=?;");
		return $this->db->execute(array($this->idethnicity));
	}
	public function status($num){
		$this->db->prepare("UPDATE tethnicity SET status=? WHERE idethnicity=?;");
		return $this->db->execute(array($num,$this->idethnicity));
	}
	public function pdf(){
		$this->db->prepare("SELECT * FROM tethnicity ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search($value){
		$this->db->prepare("SELECT idethnicity,name FROM tethnicity WHERE name LIKE '%$value%' AND status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>