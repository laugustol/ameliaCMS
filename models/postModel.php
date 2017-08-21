<?php
namespace Models;
class postModel{
	private $db,$permission;
	public $idpost,$url,$name,$color,$idgallery,$content,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT p.idpost,p.name,g.src,CONCAT(u.name,' - ',pe.name_one,' ',pe.last_name_one) as person,p.status,(SELECT count(*) FROM ".PREFIX."tpost) as countx FROM ".PREFIX."tpost p LEFT JOIN ".PREFIX."tgallery g ON p.idgallery=g.idgallery INNER JOIN ".PREFIX."tuser u ON p.iduser=u.iduser INNER JOIN ".PREFIX."tperson pe ON u.idperson=pe.idperson WHERE p.idpost LIKE '%$search%' OR p.name LIKE '%$search%' ORDER BY p.idpost DESC LIMIT $start,$length ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idpost"] = $val["idpost"];
			if(!empty($val["src"])){
				$d["data"][$key]["name"] = $val["name"]." <img src='".$val["src"]."' style='width:100px;height:50px;'>";
			}else{
				$d["data"][$key]["name"] = $val["name"];
			}
			$d["data"][$key]["person"] = $val["person"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idpost"],$val["status"]);
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
		$this->db->prepare("INSERT INTO ".PREFIX."tpost (url,name,color,idgallery,content,iduser,date_created,status) VALUES (?,?,?,?,?,NOW(),'1');");
		return $this->db->execute(array($this->url,$this->name,$this->color,$this->idgallery,$this->content,$_SESSION["iduser"]));
	}
	public function query(){
		$this->db->prepare("SELECT p.idpost,p.name,p.color,p.content,p.idgallery,g.src,p.url,CONCAT(u.name,' - ',pe.name_one,' ',pe.name_two,' ',pe.last_name_one,' ',pe.last_name_two) as person,DATE_FORMAT(p.date_created,'%d-%m-%Y') as date_created FROM ".PREFIX."tpost p LEFT JOIN ".PREFIX."tgallery g ON p.idgallery=g.idgallery INNER JOIN ".PREFIX."tuser u ON p.iduser=u.iduser INNER JOIN ".PREFIX."tperson pe ON u.idperson=pe.idperson WHERE p.idpost=? OR p.url=?;");
		$data=$this->db->execute(array($this->idpost,$this->url));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function query_all($num){
		$this->db->prepare("SELECT p.name,p.content,p.url,CONCAT(pe.name_one,' ',pe.name_two,' ',pe.last_name_one,' ',pe.last_name_two) as person,DATE_FORMAT(p.date_created,'%d-%m-%Y') as date_created FROM ".PREFIX."tpost p INNER JOIN ".PREFIX."tuser u ON p.iduser=u.iduser INNER JOIN ".PREFIX."tperson pe ON u.idperson=pe.idperson WHERE p.status='1' ORDER BY p.date_created DESC LIMIT ".($num*5).",5;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		$this->db->prepare("SELECT count(*) FROM ".PREFIX."tpost WHERE status='1';");
		$data=$this->db->execute();
		foreach ($data as $val) { $count=$val; }
		$d[0]["prev"] = ($num>0)? $num-1 : $num;
		if($count[0] > ($num*5+1)){
			$d[0]["next"] = $num+1;
		}
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tpost SET url=?,name=?,color=?,idgallery=?,content=? WHERE idpost=?;");
		return $this->db->execute(array($this->url,$this->name,$this->color,$this->idgallery,$this->content,$this->idpost));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tpost WHERE idpost=?;");
		return $this->db->execute(array($this->idpost));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tpost SET status=? WHERE idpost=?;");
		return $this->db->execute(array($num,$this->idpost));
	}
	public function pdf(){
		$this->db->prepare("SELECT p.idpost,p.name,CONCAT(u.name,' - ',pe.name_one,' ',pe.last_name_one) as person,p.status FROM ".PREFIX."tpost p INNER JOIN ".PREFIX."tuser u ON p.iduser=u.iduser INNER JOIN ".PREFIX."tperson pe ON u.idperson=pe.idperson ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>