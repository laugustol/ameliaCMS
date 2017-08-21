<?php
namespace Models;
class galleryModel{
	private $db,$permission;
	public $idgallery,$src,$title,$legend,$alternative,$description;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function dependencies(){
		$dependencies["images"] = $this->query_all();
		$dependencies["add"] = $this->permission->getpermissionadd();
		$dependencies["actions"] = $this->permission->getpermission_two();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tgallery (iduser,src,date_created) VALUES (?,?,NOW());");
		return $this->db->execute(array($_SESSION["iduser"],$this->src));
	}
	public function query(){
		$this->db->prepare("SELECT g.idgallery,g.src,g.title,g.legend,g.alternative,g.description,CONCAT(u.name,' - ',pe.name_one,' ',pe.last_name_one) as person,DATE_FORMAT(g.date_created,'%d-%m-%Y') as date_created FROM ".PREFIX."tgallery g INNER JOIN ".PREFIX."tuser u ON g.iduser=u.iduser INNER JOIN ".PREFIX."tperson pe ON u.idperson=pe.idperson WHERE g.idgallery=? OR g.src=?;");
		$data=$this->db->execute(array($this->idgallery,$this->src));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tgallery g INNER JOIN ".PREFIX."tuser u ON g.iduser=u.iduser ORDER BY g.idgallery DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tgallery SET title=?,legend=?,alternative=?,description=? WHERE idgallery=?;");
		return $this->db->execute(array($this->title,$this->legend,$this->alternative,$this->description,$this->idgallery));
	}
	public function delete(){
		$this->db->prepare("SELECT src FROM ".PREFIX."tgallery WHERE idgallery=?;");
		$this->db->execute(array($this->idgallery));
		$src = $this->db->fetchAll()[0]["src"];
		$this->db->prepare("DELETE FROM ".PREFIX."tgallery WHERE idgallery=?;");
		return ($this->db->execute(array($this->idgallery)))? $src : false;
	}
}
?>