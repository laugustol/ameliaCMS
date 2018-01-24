<?php
namespace Models;
class actionModel{
	private $db,$permission;
	public $idaction,$name,$function,$idicon,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){
		$this->db->prepare("SELECT * FROM ".PREFIX."taction; ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idaction"] = $val["idaction"];
			$d[$key]["name"] = $val["name"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idaction"],$val["status"]);
		}		
		return $d;
	}
	public function dependencies(){
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