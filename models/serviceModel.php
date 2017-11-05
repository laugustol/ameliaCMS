<?php
namespace Models;
class serviceModel{
	private $db,$permission;
	public $idservice,$idfather,$name,$url,$idicon,$color,$ordered,$status,$idaction;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
		$this->idaction = array();
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT s1.idservice,s1.name,CASE s1.idfather WHEN 0 THEN '".service_father_opt."' ELSE s2.name END AS father,s1.status,(SELECT  count(*) FROM ".PREFIX."tservice) as countx FROM ".PREFIX."tservice s1 LEFT JOIN ".PREFIX."tservice s2 ON s1.idfather=s2.idservice WHERE CAST(s1.idservice as CHAR) LIKE '%$search%' OR s1.name LIKE '%$search%' OR s2.name LIKE '%$search%' ORDER BY s1.idservice DESC LIMIT $length OFFSET $start ;");		
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idservice"] = $val["idservice"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["father"] = $val["father"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idservice"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tservice WHERE idfather=0 AND status='1' ORDER BY idservice ASC ;");
		$a=$this->db->execute();
		foreach ($a as $k1 => $val) {
			$dependencies["fathers"][$k1]["idservice"] = $val["idservice"];
			$dependencies["fathers"][$k1]["name"] = $val["name"];
			$this->db->prepare("SELECT s2.idservice,s2.name FROM ".PREFIX."tservice s1 INNER JOIN ".PREFIX."tservice s2 ON s1.idservice=s2.idfather WHERE s1.idservice = '".$val["idservice"]."' AND s2.status='1' ORDER BY s2.idservice DESC");
			$b=$this->db->execute();
			foreach ($b as $k2 => $val2) {
				$dependencies["fathers"][$k1]["childrens"][$k2]["idservice"] = $val2["idservice"];
				$dependencies["fathers"][$k1]["childrens"][$k2]["name"] = $val2["name"];
			}
		}
		$this->db->prepare("SELECT * FROM ".PREFIX."taction WHERE status='1';");
		foreach($this->db->execute() as $k => $val) {
			$dependencies["actions"][$k]["idaction"] = $val["idaction"];
			$dependencies["actions"][$k]["name"] = $val["name"];
		}
		$this->db->prepare("SELECT * FROM ".PREFIX."ticon WHERE status='1';");
		$dependencies["icons"] = $this->db->execute();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tservice (idfather,name,url,idicon,color,status) VALUES (?,?,?,?,?,'1');");
		$this->db->execute(array($this->idfather,$this->name,$this->url,$this->idicon,$this->color));
		$this->db->prepare("SELECT idservice FROM ".PREFIX."tservice ORDER BY idservice DESC LIMIT 1 OFFSET 0;");
		foreach ($this->db->execute() as $val){ $this->idservice = $val["idservice"]; }
	}
	public function addactions(){
		foreach ($this->idaction as $val) { $a .= " ('".$this->idservice."','".$val."'),"; }
		if($a!=""){
			$this->db->prepare("INSERT INTO ".PREFIX."tdservice_action (idservice,idaction) VALUES ".trim($a,",")." ;");
			return $this->db->execute();
		}else{
			return 1;
		}
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tservice WHERE idservice=? ;");
		foreach ($this->db->execute(array($this->idservice)) as $val) { $d[0]=$val; }
		$this->db->prepare("SELECT * FROM ".PREFIX."tdservice_action WHERE idservice=? ;");
		foreach ($this->db->execute(array($this->idservice)) as $val) { $d["actions"][$val["idaction"]]=$val["idaction"]; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tservice SET idfather=?,name=?,url=?,idicon=?,color=? WHERE idservice=?;");
		return $this->db->execute(array($this->idfather,$this->name,$this->url,$this->idicon,$this->color,$this->idservice));
	}
	public function deleteactions(){
		foreach ($this->idaction as $val) { $a .= "AND idaction!='".$val."' "; }
		$this->db->prepare("DELETE FROM ".PREFIX."tdservice_action WHERE idservice=? $a;");
		return $this->db->execute(array($this->idservice));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tservice WHERE idservice=?;");
		return $this->db->execute(array($this->idservice));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tservice SET status=? WHERE idservice=?;");
		return $this->db->execute(array($num,$this->idservice));
	}
	public function pdf(){
		$this->db->prepare("SELECT s2.idservice,s1.name as module,s2.name,s2.url,s2.status FROM ".PREFIX."tservice s1 RIGHT JOIN ".PREFIX."tservice s2 ON s1.idservice=s2.idfather ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function delete_ordered($iduser){
		$this->db->prepare("DELETE FROM ".PREFIX."tduser_service_ordered WHERE iduser=?");
		return $this->db->execute(array($iduser));
	}
	public function ordered($iduser){
		$this->db->prepare("INSERT INTO ".PREFIX."tduser_service_ordered (iduser,idservice,ordered) VALUES (?,?,?);");
		return $this->db->execute(array($iduser,$this->idservice,$this->ordered));
	}
}
?>