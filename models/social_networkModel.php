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
		$this->db->prepare("SELECT s.idsocial_network,s.name,s.idicon as iname,s.status,(SELECT count(*) FROM ".PREFIX."tsocial_network) as countx FROM ".PREFIX."tsocial_network s WHERE CAST(s.idsocial_network as CHAR) LIKE '%$search%' OR s.name LIKE '%$search%' ORDER BY s.idsocial_network DESC LIMIT $length OFFSET $start ;");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idsocial_network"] = $val["idsocial_network"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["iname"] = "<i class='".$val["iname"]."'></i>";
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idsocial_network"],$val["status"]);
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
		$this->db->prepare("INSERT INTO ".PREFIX."tsocial_network (name,url,idicon,status) VALUES (?,?,?,'1');");
		return $this->db->execute(array($this->name,$this->url,$this->idicon));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tsocial_network WHERE idsocial_network=? ;");
		foreach ($this->db->execute(array($this->idsocial_network)) as $val) { $d=$val; }
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT s.name,s.url,s.idicon as iname FROM ".PREFIX."tsocial_network s WHERE s.status='1';");
		foreach ($this->db->execute() as $val) { $d[]=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tsocial_network SET name=?,url=?,idicon=? WHERE idsocial_network=?;");
		return $this->db->execute(array($this->name,$this->url,$this->idicon,$this->idsocial_network));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tsocial_network WHERE idsocial_network=?;");
		return $this->db->execute(array($this->idsocial_network));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tsocial_network SET status=? WHERE idsocial_network=?;");
		return $this->db->execute(array($num,$this->idsocial_network));
	}
}
?>