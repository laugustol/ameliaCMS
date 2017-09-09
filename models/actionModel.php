<?php
namespace Models;
class actionModel{
	private $db,$permission;
	public $idaction,$name,$function,$idicon,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."taction) as countx FROM ".PREFIX."taction WHERE CAST(idaction as CHAR) LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idaction DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idaction"] = $val["idaction"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idaction"],$val["status"]);
			$d["recordsFiltered"]++;
			$d["recordsTotal"] = $val["countx"];
		}
		$d["draw"] = $draw;		
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT * FROM ".PREFIX."ticon WHERE status='1';");
		$dependencies["icons"] = $this->db->execute();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."taction (name,function,idicon,status) VALUES (?,?,?,'1');");
		return $this->db->execute(array($this->name,$this->function,$this->idicon));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."taction WHERE idaction=? ;");
		$data=$this->db->execute(array($this->idaction));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."taction SET name=?,function=?,idicon=? WHERE idaction=?;");
		return $this->db->execute(array($this->name,$this->function,$this->idicon,$this->idaction));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."taction WHERE idaction=?;");
		return $this->db->execute(array($this->idaction));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."taction SET status=? WHERE idaction=?;");
		return $this->db->execute(array($num,$this->idaction));
	}
}
?>