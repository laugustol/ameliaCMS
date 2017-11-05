<?php
namespace Models;
class chargeModel{
	private $db,$permission;
	public $idcharge,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."tcharge) as countx FROM ".PREFIX."tcharge WHERE CAST(idcharge as CHAR) LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idcharge DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idcharge"] = $val["idcharge"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idcharge"],$val["status"]);
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