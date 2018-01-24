<?php
namespace Models;
class social_networkModel{
	private $db,$permission;
	public $idsocial_network,$name,$url,$idicon,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){
		$this->db->prepare("SELECT s.idsocial_network,s.name,s.idicon as iname,s.status FROM ".PREFIX."tsocial_network s; ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idsocial_network"] = $val["idsocial_network"];
			$d[$key]["name"] = $val["name"];
			$d[$key]["iname"] = "<i class='".$val["iname"]."'></i>";
			$d[$key]["btn"] = $this->permission->getpermission($val["idsocial_network"],$val["status"]);
		}
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