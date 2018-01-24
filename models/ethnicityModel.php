<?php
namespace Models;
class ethnicityModel{
	private $db,$permission;
	public $idethnicity,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){		
		$this->db->prepare("SELECT * FROM ".PREFIX."tethnicity ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idethnicity"] = $val["idethnicity"];
			$d[$key]["name"] = $val["name"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idethnicity"],$val["status"]);
		}
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tethnicity (name,status) VALUES (?,'1');");
		return $this->db->execute(array($this->name));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tethnicity WHERE idethnicity=? ;");
		$data=$this->db->execute(array($this->idethnicity));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tethnicity SET name=? WHERE idethnicity=?;");
		return $this->db->execute(array($this->name,$this->idethnicity));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tethnicity WHERE idethnicity=?;");
		return $this->db->execute(array($this->idethnicity));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tethnicity SET status=? WHERE idethnicity=?;");
		return $this->db->execute(array($num,$this->idethnicity));
	}
	public function pdf(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tethnicity ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function search($value){
		$this->db->prepare("SELECT idethnicity,name FROM ".PREFIX."tethnicity WHERE lower(name) LIKE lower('%$value%') AND status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>