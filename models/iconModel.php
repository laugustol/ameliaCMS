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
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."ticon) as countx FROM ".PREFIX."ticon WHERE idicon LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idicon DESC LIMIT $start,$length ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idicon"] = $val["idicon"];
			$d["data"][$key]["class"] = $val["class"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idicon"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."ticon (class,name,status) VALUES (?,?,'1');");
		return $this->db->execute(array($this->class,$this->name,$this->idicon));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."ticon WHERE idicon=? ;");
		$data=$this->db->execute(array($this->idicon));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."ticon SET class=?,name=? WHERE idicon=?;");
		return $this->db->execute(array($this->class,$this->name,$this->idicon));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."ticon WHERE idicon=?;");
		return $this->db->execute(array($this->idicon));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."ticon SET status=? WHERE idicon=?;");
		return $this->db->execute(array($num,$this->idicon));
	}
}
?>