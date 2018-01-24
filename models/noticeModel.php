<?php
namespace Models;
class noticeModel{
	private $db,$permission;
	public $idnotice,$title,$content,$url,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tnotice ");
		$d= [];
		foreach ($this->db->execute() as $key => $val) {
			$d[$key]["idnotice"] = $val["idnotice"];
			$d[$key]["title"] = $val["title"];
			$d[$key]["btn"] = $this->permission->getpermission($val["idnotice"],$val["status"]);
		}
		return $d;
	}
	public function dependencies(){
		return $this->permission->getpermissionadd();
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tnotice (title,content,url,date_created,status) VALUES (?,?,?,NOW(),'1');");
		return $this->db->execute(array($this->title,$this->content,$this->url));
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tnotice WHERE idnotice=? ;");
		$data=$this->db->execute(array($this->idnotice));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tnotice SET title=?,content=?,url=? WHERE idnotice=?;");
		return $this->db->execute(array($this->title,$this->content,$this->url,$this->idnotice));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tnotice WHERE idnotice=?;");
		return $this->db->execute(array($this->idnotice));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tnotice SET status=? WHERE idnotice=?;");
		return $this->db->execute(array($num,$this->idnotice));
	}
	public function list_news(){
		$this->db->prepare("SELECT title,content,url,DATE_FORMAT(date_created,'%d-%m-%Y') as date_created FROM ".PREFIX."tnotice ORDER BY idnotice DESC LIMIT 5;");
		$data=$this->db->execute();
		foreach ($data as $k => $val) { 
			$d[$k]["title"]=$val["title"];
			$d[$k]["content"]=$val["content"];
			$d[$k]["url"]=$val["url"];
			$d[$k]["date_created"]=$val["date_created"];
		}
		return $d;
	}
}
?>