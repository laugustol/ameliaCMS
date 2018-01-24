<?php
namespace Models;
class nationalityModel{
	private $db,$permission;
	public $idnationality,$name_one,$name_two,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tnationality ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idnationality"] = $val["idnationality"];
			$d[$key]["name_one"] = $val["name_one"];
			$d[$key]["name_two"] = $val["name_two"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idnationality"],$val["status"]);
		}
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
}
?>