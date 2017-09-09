<?php
namespace Models;
class pageModel{
	private $db,$permission;
	public $idpage,$url,$link,$name,$img,$content,$view_main,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT *,(SELECT count(*) FROM ".PREFIX."tpage) as countx FROM ".PREFIX."tpage WHERE CAST(idpage as CHAR) LIKE '%$search%' OR name LIKE '%$search%' ORDER BY idpage DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idpage"] = $val["idpage"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idpage"],$val["status"]);
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
		$this->db->prepare("INSERT INTO ".PREFIX."tpage (url,link,name,img,content,view_main,status) VALUES (?,?,?,?,?,?,'1');");
		return $this->db->execute(array($this->url,$this->link,$this->name,$this->img,$this->content,$this->view_main));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tpage WHERE idpage=? OR url=?;");
		$data=$this->db->execute(array($this->idpage,$this->url));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function query_all(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tpage WHERE status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function query_all_view_main(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tpage WHERE status='1' AND view_main='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tpage SET url=?,link=?,name=?,img=?,content=?,view_main=? WHERE idpage=?;");
		return $this->db->execute(array($this->url,$this->link,$this->name,$this->img,$this->content,$this->view_main,$this->idpage));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tpage WHERE idpage=?;");
		return $this->db->execute(array($this->idpage));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tpage SET status=? WHERE idpage=?;");
		return $this->db->execute(array($num,$this->idpage));
	}
}
?>