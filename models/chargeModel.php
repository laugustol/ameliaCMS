<?php
namespace Models;
class chargeModel{
	private $db,$permission;
	public $idcharge,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){		
		$this->db->prepare("SELECT * FROM ".PREFIX."tcharge ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idcharge"] = $val["idcharge"];
			$d[$key]["name"] = $val["name"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idcharge"],$val["status"]);
		}
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tcharge (name,status) VALUES (?,'1');");
		return $this->db->execute(array($this->name));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tcharge WHERE idcharge=? ;");
		$data=$this->db->execute(array($this->idcharge));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tcharge SET name=? WHERE idcharge=?;");
		return $this->db->execute(array($this->name,$this->idcharge));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tcharge WHERE idcharge=?;");
		return $this->db->execute(array($this->idcharge));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tcharge SET status=? WHERE idcharge=?;");
		return $this->db->execute(array($num,$this->idcharge));
	}
	public function pdf(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tcharge ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>