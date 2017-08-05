<?php
namespace Models;
class pageModel{
	private $db,$permission;
	public $idpage,$url,$link,$name,$img,$content,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT * FROM tpage WHERE idpage LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idpage DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idpage"] = $val["idpage"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idpage"],$val["status"]);
		}
		$this->db->prepare("SELECT count(*) FROM tpage");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tpage WHERE idpage LIKE '%$search%' OR name LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO tpage (url,link,name,img,content,status) VALUES (?,?,?,?,?,'1');");
		return $this->db->execute(array($this->url,$this->link,$this->name,$this->img,$this->content));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM tpage WHERE idpage=? OR url=?;");
		$data=$this->db->execute(array($this->idpage,$this->url));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT * FROM tpage WHERE status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE tpage SET url=?,link=?,name=?,img=?,content=? WHERE idpage=?;");
		return $this->db->execute(array($this->url,$this->link,$this->name,$this->img,$this->content,$this->idpage));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM tpage WHERE idpage=?;");
		return $this->db->execute(array($this->idpage));
	}
	public function status($num){
		$this->db->prepare("UPDATE tpage SET status=? WHERE idpage=?;");
		return $this->db->execute(array($num,$this->idpage));
	}
}
?>