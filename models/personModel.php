<?php
namespace Models;
class personModel{
	private $db,$permission;
	public $idperson,$idnationality,$idethnicity,$idcharge,$image,$identification_card,$name_one,$name_two,$last_name_one,$last_name_two,$sex,$email,$birth_date,$birth_place,$idaddress,$address,$phone_one,$phone_two,$status;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT p.idperson,CONCAT(n.name_one,'-',p.identification_card) as nationality_identification_card,CONCAT(p.name_one,' ',p.name_two) as name_complete,CONCAT(p.last_name_one,' ',p.last_name_two) as last_name_complete,p.status,(SELECT count(*) FROM ".PREFIX."tperson) as countx FROM ".PREFIX."tperson p INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality WHERE CAST(p.idperson as CHAR) LIKE '%$search%' OR n.name_one LIKE '%$search%' OR p.identification_card LIKE '%$search%' OR p.name_one LIKE '%$search%' OR p.name_two LIKE '%$search%' OR p.last_name_one LIKE '%$search%' OR p.last_name_two LIKE '%$search%' ORDER BY idperson DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idperson"] = $val["idperson"];
			$d["data"][$key]["nationality_identification_card"] = $val["nationality_identification_card"];
			$d["data"][$key]["name_complete"] = $val["name_complete"];
			$d["data"][$key]["last_name_complete"] = $val["last_name_complete"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idperson"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT idcharge,name FROM ".PREFIX."tcharge WHERE status='1';");
		$dependencies["charges"] = $this->db->execute();
		$this->db->prepare("SELECT idnationality,CONCAT(name_one,' - ',name_two) as name  FROM ".PREFIX."tnationality WHERE status='1';");
		$dependencies["nationalitys"] = $this->db->execute();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tperson (idnationality,idethnicity,idcharge,image,identification_card,name_one,name_two,last_name_one,last_name_two,sex,email,birth_date,birth_place,idaddress,address,phone_one,phone_two,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'1');");
		return $this->db->execute(array($this->idnationality,$this->idethnicity,$this->idcharge,$this->image,$this->identification_card,$this->name_one,$this->name_two,$this->last_name_one,$this->last_name_two,$this->sex,$this->email,$this->birth_date,$this->birth_place,$this->idaddress,$this->address,$this->phone_one,$this->phone_two));
	}
	public function query(){
		$this->db->prepare("SELECT p.idperson,p.idnationality,CONCAT(n.name_one,' ',n.name_two) as nationality,p.idethnicity,p.idcharge,e.name as ethnicity,p.image,p.identification_card,p.name_one,p.name_two,p.last_name_one,p.last_name_two,p.sex,p.email,DATE_FORMAT(p.birth_date,'%d-%m-%Y') as birth_date,birth_place,p.idaddress,CONCAT(pa.name,' - ',m.name,' - ',s.name,' - ',c.name) as full_address,p.address,p.phone_one,p.phone_two FROM ".PREFIX."tperson p INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality INNER JOIN ".PREFIX."tethnicity e ON p.idethnicity=e.idethnicity INNER JOIN ".PREFIX."taddress pa ON p.idaddress=pa.idaddress INNER JOIN ".PREFIX."taddress m ON pa.idfather=m.idaddress INNER JOIN ".PREFIX."taddress s ON m.idfather=s.idaddress INNER JOIN ".PREFIX."taddress c ON s.idfather=c.idaddress WHERE p.idperson=? ;");
		$data=$this->db->execute(array($this->idperson));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE ".PREFIX."tperson SET idnationality=?,idethnicity=?,idcharge=?,image=?,identification_card=?,name_one=?,name_two=?,last_name_one=?,last_name_two=?,sex=?,email=?,birth_date=?,birth_place=?,idaddress=?,address=?,phone_one=?,phone_two=? WHERE idperson=?;");
		return $this->db->execute(array($this->idnationality,$this->idethnicity,$this->idcharge,$this->image,$this->identification_card,$this->name_one,$this->name_two,$this->last_name_one,$this->last_name_two,$this->sex,$this->email,$this->birth_date,$this->birth_place,$this->idaddress,$this->address,$this->phone_one,$this->phone_two,$this->idperson));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tuser WHERE idperson=?;");
		$this->db->execute(array($this->idperson));
		$this->db->prepare("DELETE FROM ".PREFIX."tperson WHERE idperson=?;");
		return $this->db->execute(array($this->idperson));
	}
	public function status($num){
		$this->db->prepare("UPDATE ".PREFIX."tperson SET status=? WHERE idperson=?;");
		return $this->db->execute(array($num,$this->idperson));
	}
	public function pdf(){
		$this->db->prepare("SELECT p.idperson,n.name_one, p.identification_card,CONCAT(p.name_one,' ',p.last_name_one) as name,DATE_FORMAT(p.birth_date,'%d-%m-%Y') as birth_date,p.sex,CONCAT(pa.name,' - ',m.name,' - ',s.name,' - ',c.name) AS address,ca.name as cname,p.status FROM ".PREFIX."tperson p INNER JOIN ".PREFIX."tnationality n ON p.idnationality=n.idnationality INNER JOIN ".PREFIX."taddress pa ON p.idaddress=pa.idaddress INNER JOIN ".PREFIX."taddress m ON pa.idfather=m.idaddress INNER JOIN ".PREFIX."taddress s ON m.idfather=s.idaddress INNER JOIN ".PREFIX."taddress c ON s.idfather=c.idaddress INNER JOIN ".PREFIX."tcharge ca ON p.idcharge=ca.idcharge ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>