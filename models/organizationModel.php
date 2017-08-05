<?php
namespace Models;
class organizationModel{
	private $db;
	public $name_one,$name_two,$email,$description,$idgallery_header,$idgallery_favicon,$address,$rights,$phone_one,$phone_two,$phone_three;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function query(){
		$this->db->prepare("SELECT o.name_one,o.name_two,o.email,o.description,g1.idgallery as idgallery_header,g1.src as src_header,g2.idgallery as idgallery_favicon,g2.src as src_favicon,o.address,o.rights,o.phone_one,o.phone_two,o.phone_three FROM torganization o LEFT JOIN tgallery g1 ON o.idgallery_header=g1.idgallery LEFT JOIN tgallery g2 ON o.idgallery_favicon=g2.idgallery;");
		$data=$this->db->execute();
		foreach ($data as $val) { $d=$val; }
		return $d;
	}
	public function edit(){
		$this->db->prepare("UPDATE torganization SET name_one=?,name_two=?,email=?,description=?,idgallery_header=?,idgallery_favicon=?,address=?,rights=?,phone_one=?,phone_two=?,phone_three=?");
		return $this->db->execute(array($this->name_one,$this->name_two,$this->email,$this->description,$this->idgallery_header,$this->idgallery_favicon,$this->address,$this->rights,$this->phone_one,$this->phone_two,$this->phone_three));
	}
}
?>