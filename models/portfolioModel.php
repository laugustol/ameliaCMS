<?php
namespace Models;
class portfolioModel{
	private $db,$permission;
	public $idportfolio,$title,$description,$idgallery,$idpage,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tportfolio ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idportfolio"] = $val["idportfolio"];
			$d[$key]["title"] = $val["title"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idportfolio"],$val["status"]);
		}
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT p.idpage,p.name FROM ".PREFIX."tpage p ;");
		$dependencies["idpage"] = $this->db->execute();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tportfolio (title,description,idgallery,idpage,status) VALUES (?,?,?,?,'1');");
		return $this->db->execute(array($this->title,$this->description,$this->idgallery,$this->idpage));
	}
	public function query(){
		$this->db->prepare("SELECT s.idportfolio,s.title,s.description,s.idgallery,g.src,s.idpage FROM ".PREFIX."tportfolio s LEFT JOIN ".PREFIX."tgallery g ON s.idgallery=g.idgallery WHERE idportfolio=? ;");
		$data=$this->db->execute(array($this->idportfolio));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT sh.title,sh.description,g.src,p.link,p.url FROM ".PREFIX."tportfolio sh LEFT JOIN ".PREFIX."tgallery g ON sh.idgallery=g.idgallery  LEFT JOIN ".PREFIX."tpage p ON sh.idpage=p.idpage WHERE sh.status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tportfolio SET title=?,description=?,idgallery=?,idpage=? WHERE idportfolio=?;");
		return $this->db->execute(array($this->title,$this->description,$this->idgallery,$this->idpage,$this->idportfolio));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tportfolio WHERE idportfolio=?;");
		return $this->db->execute(array($this->idportfolio));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tportfolio SET status=? WHERE idportfolio=?;");
		return $this->db->execute(array($num,$this->idportfolio));
	}
}
?>