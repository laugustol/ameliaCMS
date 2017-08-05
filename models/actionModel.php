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
		$this->db->prepare("SELECT * FROM taction WHERE idaction LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idaction DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idaction"] = $val["idaction"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idaction"],$val["status"]);
		}
		$this->db->prepare("SELECT count(*) FROM taction");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM taction WHERE idaction LIKE '%$search%' OR name LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT * FROM ticon WHERE status='1';");
		$dependencies["icons"] = $this->db->execute();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO taction (name,function,idicon,status) VALUES (?,?,?,'1');");
		return $this->db->execute(array($this->name,$this->function,$this->idicon));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM taction WHERE idaction=? ;");
		$data=$this->db->execute(array($this->idaction));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE taction SET name=?,function=?,idicon=? WHERE idaction=?;");
		return $this->db->execute(array($this->name,$this->function,$this->idicon,$this->idaction));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM taction WHERE idaction=?;");
		return $this->db->execute(array($this->idaction));
	}
	public function status($num){
		$this->db->prepare("UPDATE taction SET status=? WHERE idaction=?;");
		return $this->db->execute(array($num,$this->idaction));
	}
}
?>