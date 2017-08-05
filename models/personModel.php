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
		$this->db->prepare("SELECT p.idperson,CONCAT(n.name_one,'-',p.identification_card) as nationality_identification_card,CONCAT(p.name_one,' ',p.name_two) as name_complete,CONCAT(p.last_name_one,' ',p.last_name_two) as last_name_complete,p.status FROM tperson p INNER JOIN tnationality n ON p.idnationality=n.idnationality WHERE p.idperson LIKE '%$search%' OR n.name_one LIKE '%$search%' OR p.identification_card LIKE '%$search%' OR p.name_one LIKE '%$search%' OR p.name_two LIKE '%$search%' OR p.last_name_one LIKE '%$search%' OR p.last_name_two LIKE '%$search%' ORDER BY idperson DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idperson"] = $val["idperson"];
			$d["data"][$key]["nationality_identification_card"] = $val["nationality_identification_card"];
			$d["data"][$key]["name_complete"] = $val["name_complete"];
			$d["data"][$key]["last_name_complete"] = $val["last_name_complete"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idperson"],$val["status"]);
		}
		$this->db->prepare("SELECT count(*) FROM tperson");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tperson p INNER JOIN tnationality n ON p.idnationality=n.idnationality WHERE p.idperson LIKE '%$search%' OR n.name_one LIKE '%$search%' OR p.identification_card LIKE '%$search%' OR p.name_one LIKE '%$search%' OR p.name_two LIKE '%$search%' OR p.last_name_one LIKE '%$search%' OR p.last_name_two LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT idcharge,name FROM tcharge WHERE status='1';");
		$dependencies["charges"] = $this->db->execute();
		$dependencies["add"] = $this->permission->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO tperson (idnationality,idethnicity,idcharge,image,identification_card,name_one,name_two,last_name_one,last_name_two,sex,email,birth_date,birth_place,idaddress,address,phone_one,phone_two,status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'1');");
		return $this->db->execute(array($this->idnationality,$this->idethnicity,$this->idcharge,$this->image,$this->identification_card,$this->name_one,$this->name_two,$this->last_name_one,$this->last_name_two,$this->sex,$this->email,$this->birth_date,$this->birth_place,$this->idaddress,$this->address,$this->phone_one,$this->phone_two));
	}
	public function query(){
		$this->db->prepare("SELECT p.idperson,p.idnationality,CONCAT(n.name_one,' ',n.name_two) as nationality,p.idethnicity,p.idcharge,e.name as ethnicity,p.image,p.identification_card,p.name_one,p.name_two,p.last_name_one,p.last_name_two,p.sex,p.email,DATE_FORMAT(p.birth_date,'%d-%m-%Y') as birth_date,birth_place,p.idaddress,CONCAT(pa.name,' - ',m.name,' - ',s.name,' - ',c.name) as full_address,p.address,p.phone_one,p.phone_two FROM tperson p INNER JOIN tnationality n ON p.idnationality=n.idnationality INNER JOIN tethnicity e ON p.idethnicity=e.idethnicity INNER JOIN taddress pa ON p.idaddress=pa.idaddress INNER JOIN taddress m ON pa.idfather=m.idaddress INNER JOIN taddress s ON m.idfather=s.idaddress INNER JOIN taddress c ON s.idfather=c.idaddress WHERE p.idperson=? ;");
		$data=$this->db->execute(array($this->idperson));
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE tperson SET idnationality=?,idethnicity=?,idcharge=?,image=?,identification_card=?,name_one=?,name_two=?,last_name_one=?,last_name_two=?,sex=?,email=?,birth_date=?,birth_place=?,idaddress=?,address=?,phone_one=?,phone_two=? WHERE idperson=?;");
		return $this->db->execute(array($this->idnationality,$this->idethnicity,$this->idcharge,$this->image,$this->identification_card,$this->name_one,$this->name_two,$this->last_name_one,$this->last_name_two,$this->sex,$this->email,$this->birth_date,$this->birth_place,$this->idaddress,$this->address,$this->phone_one,$this->phone_two,$this->idperson));
	}
	public function delete(){
		$this->db->prepare("DELETE FROM tuser WHERE idperson=?;");
		$this->db->execute(array($this->idperson));
		$this->db->prepare("DELETE FROM tperson WHERE idperson=?;");
		return $this->db->execute(array($this->idperson));
	}
	public function status($num){
		$this->db->prepare("UPDATE tperson SET status=? WHERE idperson=?;");
		return $this->db->execute(array($num,$this->idperson));
	}
	public function pdf(){
		$this->db->prepare("SELECT p.idperson,n.name_one, p.identification_card,CONCAT(p.name_one,' ',p.last_name_one) as name,DATE_FORMAT(p.birth_date,'%d-%m-%Y') as birth_date,p.sex,CONCAT(pa.name,' - ',m.name,' - ',s.name,' - ',c.name) AS address,ca.name as cname,p.status FROM tperson p INNER JOIN tnationality n ON p.idnationality=n.idnationality INNER JOIN taddress pa ON p.idaddress=pa.idaddress INNER JOIN taddress m ON pa.idfather=m.idaddress INNER JOIN taddress s ON m.idfather=s.idaddress INNER JOIN taddress c ON s.idfather=c.idaddress INNER JOIN tcharge ca ON p.idcharge=ca.idcharge ORDER BY 1 DESC;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
}
?>