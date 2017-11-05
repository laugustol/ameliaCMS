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
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."tethnicity) as countx FROM ".PREFIX."tethnicity WHERE CAST(idethnicity as CHAR) LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idethnicity DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idethnicity"] = $val["idethnicity"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idethnicity"],$val["status"]);
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