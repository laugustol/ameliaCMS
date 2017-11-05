<?php
namespace Models;
class themeModel{
	private $db,$permission;
	public $idtheme,$name,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function dependencies(){
		$this->db->prepare("SELECT * FROM ".PREFIX."ttheme ORDER BY 1 DESC");
		return $this->db->execute();
	}
	public function status($num){
		$this->db->exec_native("UPDATE ".PREFIX."ttheme SET status='0';");
		$this->db->prepare("UPDATE ".PREFIX."ttheme SET status=? WHERE idtheme=?;");
		return $this->db->execute(array($num,$this->idtheme));
	}
	public function theme_active(){
		$this->db->prepare("SELECT src FROM ".PREFIX."ttheme WHERE status='1';");
		foreach ($this->db->execute() as $k => $val){ return $val["src"]; }
	}
	public function list_themes($ids,$pagination){
		$pagination = (empty($pagination))? 0 : $pagination;
		if(is_array($ids)){
			foreach ($ids as $val){ $or .= " AND idtheme_origin!=".$val; }
		}else{
			$or = " AND idtheme_origin!=".$ids;
		}
		$this->db->prepare("SELECT * FROM ".PREFIX."ttheme_origin WHERE ".substr($or,4)." AND status='1' LIMIT $pagination,5");
		foreach ($this->db->execute() as $k => $val) { 
			$d[$k]["idtheme_origin"]=$val["idtheme_origin"];
			$d[$k]["name"]=$val["name"];
			$d[$k]["description"]=$val["description"];
			$d[$k]["img"]=$val["img"];
			$d[$k]["src"]=$val["src"];
		}
		$d[0]["pagination"] = (empty($pagination))? 5 : pagination*2;
		return $d;
	}
}
?>