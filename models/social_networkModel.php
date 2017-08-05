<?php
namespace Models;
class social_networkModel{
	private $db,$permission;
	public $idsocial_network,$name,$url,$idicon,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT s.idsocial_network,s.name,i.class,i.name as iname,s.status FROM tsocial_network s INNER JOIN ticon i ON s.idicon=i.idicon WHERE s.idsocial_network LIKE '%$search%' OR s.name LIKE '%$search%' ORDER BY s.idsocial_network DESC LIMIT $start,$length ;");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idsocial_network"] = $val["idsocial_network"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["iname"] = "<i class='".$val["class"]." ".$val["iname"]."'></i>";
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idsocial_network"],$val["status"]);
		}
		$this->db->prepare("SELECT count(*) FROM tsocial_network");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tsocial_network s WHERE s.idsocial_network LIKE '%$search%' OR s.name LIKE '%$search%' LIMIT $start,$length ;");
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
		$this->db->prepare("INSERT INTO tsocial_network (name,url,idicon,status) VALUES (?,?,?,'1');");
		return $this->db->execute(array($this->name,$this->url,$this->idicon));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM tsocial_network WHERE idsocial_network=? ;");
		foreach ($this->db->execute(array($this->idsocial_network)) as $val) { $d=$val; }
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT s.name,s.url,i.class,i.name as iname FROM tsocial_network s INNER JOIN ticon i ON s.idicon=i.idicon WHERE s.status='1';");
		foreach ($this->db->execute() as $val) { $d[]=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE tsocial_network SET name=?,url=?,idicon=? WHERE idsocial_network=?;");
		return $this->db->execute(array($this->name,$this->url,$this->idicon,$this->idsocial_network));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM tsocial_network WHERE idsocial_network=?;");
		return $this->db->execute(array($this->idsocial_network));
	}
	public function status($num){
		$this->db->prepare("UPDATE tsocial_network SET status=? WHERE idsocial_network=?;");
		return $this->db->execute(array($num,$this->idsocial_network));
	}
}
?>