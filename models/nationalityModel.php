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
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."tnationality) as countx FROM ".PREFIX."tnationality WHERE CAST(idnationality as CHAR)LIKE '%$search%' OR name_one LIKE '%$search%' OR name_two LIKE '%$search%' ORDER BY idnationality DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idnationality"] = $val["idnationality"];
			$d["data"][$key]["name_one"] = $val["name_one"];
			$d["data"][$key]["name_two"] = $val["name_two"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idnationality"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tnationality (name_one,name_two,status) VALUES (?,?,'1');");
		return $this->db->execute(array($this->name_one,$this->name_two));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tnationality WHERE idnationality=? ;");
		$data=$this->db->execute(array($this->idnationality));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tnationality SET name_one=?,name_two=? WHERE idnationality=?;");
		return $this->db->execute(array($this->name_one,$this->name_two,$this->idnationality));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tnationality WHERE idnationality=?;");
		return $this->db->execute(array($this->idnationality));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tnationality SET status=? WHERE idnationality=?;");
		return $this->db->execute(array($num,$this->idnationality));
	}
	public function pdf(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tnationality ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search($value){
		$this->db->prepare("SELECT idnationality,CONCAT(name_one,' ',name_two) FROM ".PREFIX."tnationality WHERE lower(name_one) LIKE lower('%$value%') OR lower(name_two) LIKE lower('%$value%') AND status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>