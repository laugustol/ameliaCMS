<?php
namespace Models;
class servicehomeModel{
	private $db,$permission;
	public $idservicehome,$title,$description,$idicon,$idgallery,$idpage,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."tservicehome) as countx FROM ".PREFIX."tservicehome WHERE CAST(idservicehome as CHAR) LIKE '%$search%' OR title LIKE '%$search%' ORDER BY idservicehome DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idservicehome"] = $val["idservicehome"];
			$d["data"][$key]["title"] = $val["title"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idservicehome"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT p.idpage,p.name FROM ".PREFIX."tpage p ;");
		$dependencies["idpage"] = $this->db->execute();
		$this->db->prepare("SELECT * FROM ".PREFIX."ticon WHERE status='1';");
		$dependencies["icons"] = $this->db->execute();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tservicehome (title,description,idicon,idgallery,idpage,status) VALUES (?,?,?,?,?,'1');");
		return $this->db->execute(array($this->title,$this->description,$this->idicon,$this->idgallery,$this->idpage));
	}
	public function query(){
		$this->db->prepare("SELECT s.idservicehome,s.title,s.description,s.idicon,s.idgallery,g.src,s.idpage FROM ".PREFIX."tservicehome s LEFT JOIN ".PREFIX."tgallery g ON s.idgallery=g.idgallery WHERE idservicehome=? ;");
		$data=$this->db->execute(array($this->idservicehome));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT sh.title,sh.description,i.class,i.name,g.src,p.url,p.link FROM ".PREFIX."tservicehome sh LEFT JOIN ".PREFIX."tgallery g ON sh.idgallery=g.idgallery INNER JOIN ".PREFIX."ticon i ON sh.idicon=i.idicon LEFT JOIN ".PREFIX."tpage p ON sh.idpage=p.idpage WHERE sh.status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tservicehome SET title=?,description=?,idicon=?,idgallery=?,idpage=? WHERE idservicehome=?;");
		return $this->db->execute(array($this->title,$this->description,$this->idicon,$this->idgallery,$this->idpage,$this->idservicehome));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tservicehome WHERE idservicehome=?;");
		return $this->db->execute(array($this->idservicehome));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tservicehome SET status=? WHERE idservicehome=?;");
		return $this->db->execute(array($num,$this->idservicehome));
	}
}
?>