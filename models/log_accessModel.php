<?php
namespace Models;
class log_accessModel{
	private $db,$permission;
	public $idlog_access,$name,$message;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		$this->permission = new \models\permissionModel;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT *,DATE_FORMAT(date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM tlog_access WHERE idlog_access LIKE '%$search%' OR name LIKE '%$search%' OR message LIKE '%$search%' OR ip LIKE '%$search%' OR browser LIKE '%$search%' OR date_created LIKE '%$search%' OR operative_system LIKE '%$search%' ORDER BY idlog_access DESC LIMIT $start,$length ");
		$a1 = $this->db->execute();
		while($b = $a1->fetchAll()){ $c = $b; }
		$d["data"]="";
		foreach ($c as $key => $val) {
			$d["data"][$key]["idlog_access"] = $val["idlog_access"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["message"] = $val["message"];
			$d["data"][$key]["ip"] = $val["ip"];
			$d["data"][$key]["browser"] = $val["browser"];
			$d["data"][$key]["date_created"] = $val["date_created"];
			$d["data"][$key]["operative_system"] = $val["operative_system"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idlog_access"],$val["status"],3);
		}
		$this->db->prepare("SELECT count(*) FROM tlog_access");
		$a2 = $this->db->execute();
		while($b2 = $a2->fetchAll()){ $c2 = $b2; }
		$d["draw"] = $draw;
		$d["recordsTotal"] = $c2[0][0];
		$this->db->prepare("SELECT count(*) FROM tlog_access WHERE idlog_access LIKE '%$search%' OR name LIKE '%$search%' OR message LIKE '%$search%' OR ip LIKE '%$search%' OR browser LIKE '%$search%' OR date_created LIKE '%$search%' OR operative_system LIKE '%$search%' LIMIT $start,$length");
		$a3 = $this->db->execute();
		while($b3 = $a3->fetchAll()){ $c3 = $b3; }
		$d["recordsFiltered"] = $c3[0][0];
		return $d;
	}
	public function add($user,$message){
		$info = $this->get_info();
		$this->db->prepare("INSERT INTO tlog_access (name,message,ip,browser,date_created,operative_system) VALUES (?,?,?,?,NOW(),?);");
		return $this->db->execute(array($user,$message,$info["ip"],$info["browser"],$info["operative_system"]));
	}
	public function pdf(){
		$this->db->prepare("SELECT *,DATE_FORMAT(date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM tlog_access ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	private function get_info(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
			$info["ip"]=$_SERVER['HTTP_CLIENT_IP']; 
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
			$info["ip"]=$_SERVER['HTTP_X_FORWARDED_FOR']; 
		}else{ 
			$info["ip"]=$_SERVER['REMOTE_ADDR']; 
		}

		$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME","EDGE");
		$os=array("WIN","MAC","LINUX");
		
		$info['browser'] = "OTHER";
		$info['os'] = "OTHER";
		
		foreach($browser as $parent){
			$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
			$f = $s + strlen($parent);
			$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
			$version = preg_replace('/[^0-9,.]/','',$version);
			if ($s){
				$info['browser'] = $parent." ".$version;
				//$info['version'] = $version;
			}
		}
		
		$plataformas = array(
	      'WINDOWS 10' => 'Windows NT 10.0+',
	      'WINDOWS 8.1' => 'Windows NT 6.3+',
	      'WINDOWS 8' => 'Windows NT 6.2+',
	      'WINDOWS 7' => 'Windows NT 6.1+',
	      'WINDOWS Vista' => 'Windows NT 6.0+',
	      'WINDOWS XP' => 'Windows NT 5.1+',
	      'WINDOWS 2003' => 'Windows NT 5.2+',
	      'WINDOWS' => 'Windows otros',
	      'IPHONE' => 'iPhone',
	      'IPAD' => 'iPad',
	      'MAC OS X' => '(Mac OS X+)|(CFNetwork+)',
	      'MAC OTROS' => 'Macintosh',
	      'ANDROID' => 'Android',
	      'BLACKBERRY' => 'BlackBerry',
	      'LINUX' => 'Linux',
	   );
	   foreach($plataformas as $plataforma=>$pattern){
	      if (preg_match('/'.$pattern.'/i', $_SERVER['HTTP_USER_AGENT']))
	      	$info['operative_system']= $plataforma;
	   }
		return $info;
	}
}
?>