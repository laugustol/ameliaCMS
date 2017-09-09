<?php
namespace Models;
class sliderModel{
	private $db,$permission;
	public $idslider,$name,$status,$idgallery,$title,$description,$idpage;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."tslider) as countx FROM ".PREFIX."tslider WHERE CAST(idslider as CHAR) LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idslider DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idslider"] = $val["idslider"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idslider"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT p.idpage,p.name FROM ".PREFIX."tpage p ;");
		foreach ($this->db->execute() as $k => $val) {
			$dependencies["idpage"][$k]["idpage"] = $val["idpage"];
			$dependencies["idpage"][$k]["name"] = $val["name"];
		}
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("UPDATE ".PREFIX."tslider SET status='0'; ");
		$this->db->execute();
		$this->db->prepare("INSERT INTO ".PREFIX."tslider (name,status) VALUES (?,'1');");
		$this->db->execute(array($this->name));
		$this->db->prepare("SELECT idslider FROM ".PREFIX."tslider ORDER BY idslider DESC LIMIT 0,1;");
		foreach ($this->db->execute() as $val){ $this->idslider = $val["idslider"]; }
	}
	public function addimgs(){
		foreach ($this->idgallery as $k => $val) { $a .= " ('".$this->idslider."',".$val.",'".$this->title[$k]."','".$this->description[$k]."',".$this->idpage[$k]."),"; }
		if($a!=""){
			$this->db->prepare("INSERT INTO ".PREFIX."tdslider (idslider,idgallery,title,description,idpage) VALUES ".trim($a,",")." ;");
			return $this->db->execute();
		}else{
			return 1;
		}
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tslider WHERE idslider=? ;");
		foreach ($this->db->execute(array($this->idslider)) as $val) { $d[0]=$val; }
		$this->db->prepare("SELECT s.idgallery,g.src,s.title,s.description FROM ".PREFIX."tdslider s INNER JOIN ".PREFIX."tgallery g ON s.idgallery=g.idgallery WHERE idslider=? ;");
		foreach ($this->db->execute(array($this->idslider)) as $k => $val) { 
			$d["imgs"][$k]["idgallery"]=$val["idgallery"];
			$d["imgs"][$k]["src"]=$val["src"];
			$d["imgs"][$k]["title"]=$val["title"];
			$d["imgs"][$k]["description"]=$val["description"];
			$d["imgs"][$k]["idpage"]=$val["idpage"];
		}
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT g.src,ds.title,ds.description,p.link,p.url FROM ".PREFIX."tslider s INNER JOIN ".PREFIX."tdslider ds ON s.idslider=ds.idslider INNER JOIN ".PREFIX."tgallery g ON ds.idgallery=g.idgallery LEFT JOIN ".PREFIX."tpage p ON ds.idpage=p.idpage WHERE s.status='1' ;");
		foreach ($this->db->execute() as $k => $val) { 
			$d[$k]["src"]=$val["src"];
			$d[$k]["title"]=$val["title"];
			$d[$k]["description"]=$val["description"];
			$d[$k]["link"]=$val["link"];
			$d[$k]["url"]=$val["url"];
		}
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tslider SET name=? WHERE idslider=?;");
		return $this->db->execute(array($this->name,$this->idslider));
	}
	public function deleteimgs(){
		$this->db->prepare("DELETE FROM ".PREFIX."tdslider WHERE idslider=? ;");
		return $this->db->execute(array($this->idslider));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tslider WHERE idslider=?;");
		return $this->db->execute(array($this->idslider));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tslider SET status='0';");
		$this->db->execute();
		$this->db->prepare("UPDATE ".PREFIX."tslider SET status=? WHERE idslider=?;");
		return $this->db->execute(array($num,$this->idslider));

	}
}
?>