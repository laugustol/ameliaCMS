<?php
namespace themes\basica;
class installthemeModel{
	private $db;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."ttheme (idtheme,name,description,src,img,status) VALUES ('2','Basica','Simple tema web','basica/','img','1');");
		return $this->db->execute();
	}
}
?>