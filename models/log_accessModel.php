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
		$this->db->prepare("SELECT *,DATE_FORMAT(date_created,'%d-%m-%Y %h:%i:%s %p') as date_created,(SELECT count(*) FROM ".PREFIX."tlog_access) as countx FROM ".PREFIX."tlog_access WHERE CAST(idlog_access as CHAR) LIKE '%$search%' OR name LIKE '%$search%' OR message LIKE '%$search%' OR ip LIKE '%$search%' OR browser LIKE '%$search%' OR CAST(date_created as CHAR) LIKE '%$search%' OR operative_system LIKE '%$search%' ORDER BY idlog_access DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idlog_access"] = $val["idlog_access"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["message"] = $val["message"];
			$d["data"][$key]["ip"] = $val["ip"];
			$d["data"][$key]["browser"] = $val["browser"];
			$d["data"][$key]["date_created"] = $val["date_created"];
			$d["data"][$key]["operative_system"] = $val["operative_system"];
			$d["data"][$key]["btn"] = $this->permission->getpermission($val["idlog_access"],$val["status"],3);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function add($user,$message){
		$info = $this->get_info();
		$this->db->prepare("INSERT INTO ".PREFIX."tlog_access (name,message,ip,browser,date_created,operative_system) VALUES (?,?,?,?,NOW(),?);");
		return $this->db->execute(array($user,$message,$info["ip"],$info["browser"],$info["operative_system"]));
	}
	public function pdf(){
		$this->db->prepare("SELECT *,DATE_FORMAT(date_created,'%d-%m-%Y %h:%i:%s %p') as date_created FROM ".PREFIX."tlog_access ORDER BY 1 DESC ");
		$data=$this->db->execute();
		foreach ($data as $val) { $d[]=$val; }
		return $d;
	}
	public function graph(){
		$this->db->prepare("SELECT count(*) as countx,message FROM ".PREFIX."tlog_access GROUP BY message");
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