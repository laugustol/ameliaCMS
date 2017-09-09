<?php
namespace models;
class permissionModel{
	private $db;
	public $idcharge,$idservice,$idaction;
	public function __construct(){
		$this->db = new \core\ameliaBD;
	}
	public function listt($draw,$search,$start,$length){
		$start = (empty($start))? 0 : $start;
		$length = (empty($length))? 10 : $length;
		$this->db->prepare("SELECT idcharge,name,status,(SELECT count(*) FROM ".PREFIX."tcharge) as countx FROM ".PREFIX."tcharge WHERE CAST(idcharge as CHAR) LIKE '%$search%' OR name LIKE '%$search%' AND status='1' ORDER BY idcharge DESC LIMIT $length OFFSET $start ");
		$d["data"]= [];$d["recordsFiltered"] = 0;$d["recordsTotal"] = 0;
		foreach ($this->db->execute() as $key => $val) {
			$d["data"][$key]["idcharge"] = $val["idcharge"];
			$d["data"][$key]["name"] = $val["name"];
			$d["data"][$key]["btn"] = $this->getpermission($val["idcharge"],$val["status"]);
			$d["recordsFiltered"] = $val["countx"];
			$d["recordsTotal"]++;
		}
		$d["draw"] = $draw;
		return $d;
	}
	public function dependencies(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tcharge WHERE idcharge!=? AND status='1'");
		$dependencies["charges"] = $this->db->execute(array($this->idcharge));
		$this->db->prepare("SELECT count(DISTINCT sa.idaction) FROM ".PREFIX."tdservice_action sa");
		foreach ($this->db->execute() as $a) {
			$dependencies["count_actions"] = $a[0];
		}
		$this->db->prepare("SELECT s.idservice,s.name FROM ".PREFIX."tservice s LEFT JOIN ".PREFIX."tduser_service_ordered uso ON s.idservice=uso.idservice AND uso.iduser='".$_SESSION["iduser"]."' WHERE s.idfather='0' AND s.status='1' ORDER BY uso.ordered");
		foreach ($this->db->execute() as $k1 => $val) {
			$dependencies["service_actions"][$k1]["idservice"] = $val["idservice"];
			$dependencies["service_actions"][$k1]["sname"] = $val["name"];
			$this->db->prepare("SELECT s2.idservice,s2.name FROM ".PREFIX."tservice s2 LEFT JOIN ".PREFIX."tduser_service_ordered uso ON s2.idservice=uso.idservice AND uso.iduser='".$_SESSION["iduser"]."' WHERE s2.idfather=? AND s2.status='1' ORDER BY uso.ordered;");
			foreach ($this->db->execute(array($val["idservice"])) as $k2 => $val2) {
				$dependencies["service_actions"][$k1]["services"][$k2]["idservice"] = $val2["idservice"];
				$dependencies["service_actions"][$k1]["services"][$k2]["name"] = $val2["name"];
				$this->db->prepare("SELECT a.idaction,a.name FROM ".PREFIX."tdservice_action sa 
				INNER JOIN ".PREFIX."taction a ON sa.idaction=a.idaction 
				WHERE sa.idservice=? ORDER BY a.function ASC");
				foreach ($this->db->execute(array($val2["idservice"])) as $k3 => $val3) {
					$dependencies["service_actions"][$k1]["services"][$k2]["actions"][$k3]["idaction"] = $val3["idaction"];
					$dependencies["service_actions"][$k1]["services"][$k2]["actions"][$k3]["name"] = $val3["name"];
				}
				$this->db->prepare("SELECT s2.idservice,s2.name FROM ".PREFIX."tservice s2 LEFT JOIN ".PREFIX."tduser_service_ordered uso ON s2.idservice=uso.idservice AND uso.iduser='".$_SESSION["iduser"]."' WHERE s2.idfather=? AND s2.status='1' ORDER BY uso.ordered;");
				foreach($this->db->execute(array($val2["idservice"])) as $k4 => $val4) {
					$dependencies["service_actions"][$k1]["services"][$k2]["services"][$k4]["idservice"] = $val4["idservice"];
					$dependencies["service_actions"][$k1]["services"][$k2]["services"][$k4]["name"] = $val4["name"];
					$this->db->prepare("SELECT a.idaction,a.name FROM ".PREFIX."tdservice_action sa 
					INNER JOIN ".PREFIX."taction a ON sa.idaction=a.idaction 
					WHERE sa.idservice=? ORDER BY a.function ASC");
					foreach ($this->db->execute(array($val4["idservice"])) as $k5 => $val5) {
						$dependencies["service_actions"][$k1]["services"][$k2]["services"][$k4]["actions"][$k5]["idaction"] = $val5["idaction"];
						$dependencies["service_actions"][$k1]["services"][$k2]["services"][$k4]["actions"][$k5]["name"] = $val5["name"];
					}	
				}
			}
		}
		$dependencies["add"] = $this->getpermissionadd();
		return $dependencies;
	}
	public function add(){
		$this->db->prepare("INSERT INTO ".PREFIX."tdcharge_service_action (idcharge,idservice,idaction) VALUES ('$this->idcharge','$this->idservice','$this->idaction') ");
		return $this->db->execute();
	}
	public function query(){
		$this->db->prepare("SELECT * FROM ".PREFIX."tcharge WHERE idcharge=? ;");
		foreach ($this->db->execute(array($this->idcharge)) as $val){ $d[0]=$val; }
		$this->db->prepare("SELECT * FROM ".PREFIX."tdcharge_service_action WHERE idcharge=? ;");
		foreach ($this->db->execute(array($this->idcharge)) as $val) { $d["actions"][$val["idservice"].$val["idaction"]]=$val["idaction"]; }
		return $d;
	}
	public function delete(){
		$this->db->prepare("DELETE FROM ".PREFIX."tdcharge_service_action WHERE idcharge=?");
		return $this->db->execute(array($this->idcharge));
	}
	public function generate_main(){
		$this->db->prepare("SELECT DISTINCT s.idservice,s.name,s.url,s.color,i.class,i.name as iname,uso.ordered FROM ".PREFIX."tservice s INNER JOIN ".PREFIX."ticon i ON s.idicon=i.idicon INNER JOIN ".PREFIX."tservice s2 ON s.idservice=s2.idfather INNER JOIN ".PREFIX."tdcharge_service_action csa ON s2.idservice=csa.idservice LEFT JOIN ".PREFIX."tduser_service_ordered uso ON s.idservice=uso.idservice AND uso.iduser='".$_SESSION["iduser"]."' WHERE s.idfather=0 AND csa.idcharge='".$_SESSION["idcharge"]."' AND s.status='1' ORDER BY uso.ordered ASC;");
		foreach ($this->db->execute() as $k => $father){
			$main[$k]["idservice"] = $father["idservice"];
			$main[$k]["name"] = $father["name"];
			$main[$k]["url"] = $father["url"];
			$main[$k]["color"] = $father["color"];
			$main[$k]["class"] = $father["class"];
			$main[$k]["iname"] = $father["iname"];
			$this->db->prepare("SELECT DISTINCT s.idservice,s.name,s.url,s.color,i.class,i.name as iname,uso.ordered FROM ".PREFIX."tservice s LEFT JOIN ".PREFIX."tdcharge_service_action csa ON s.idservice=csa.idservice INNER JOIN ".PREFIX."taction a ON csa.idaction=a.idaction INNER JOIN ".PREFIX."ticon i ON s.idicon=i.idicon LEFT JOIN ".PREFIX."tduser_service_ordered uso ON s.idservice=uso.idservice AND uso.iduser='".$_SESSION["iduser"]."' WHERE s.idfather='".$father["idservice"]."' AND csa.idcharge='".$_SESSION["idcharge"]."' AND s.status='1' AND a.function<>'6' ORDER BY uso.ordered ASC;");
			foreach ($this->db->execute() as $k2 => $child){
				$main[$k]["childrens"][$k2]["idservice"] = $child["idservice"];
				$main[$k]["childrens"][$k2]["name"] = $child["name"];
				$main[$k]["childrens"][$k2]["url"] = $child["url"];
				$main[$k]["childrens"][$k2]["color"] = $child["color"];
				$main[$k]["childrens"][$k2]["class"] = $child["class"];
				$main[$k]["childrens"][$k2]["iname"] = $child["iname"];
				$this->db->prepare("SELECT s.idservice,s.name,s.url,s.color,i.class,i.name as iname FROM ".PREFIX."tservice s INNER JOIN ".PREFIX."ticon i ON s.idicon=i.idicon WHERE s.idfather='".$child["idservice"]."' AND s.status='1';");
				$secondschildrens = $this->db->execute();
				foreach ($secondschildrens as $k3 => $secondchild) {
					$main[$k]["childrens"][$k2]["secondschildrens"][$k3]["idservice"] = $secondchild["idservice"];
					$main[$k]["childrens"][$k2]["secondschildrens"][$k3]["name"] = $secondchild["name"];
					$main[$k]["childrens"][$k2]["secondschildrens"][$k3]["url"] = $secondchild["url"];
					$main[$k]["childrens"][$k2]["secondschildrens"][$k3]["color"] = $secondchild["color"];
					$main[$k]["childrens"][$k2]["secondschildrens"][$k3]["class"] = $secondchild["class"];
					$main[$k]["childrens"][$k2]["secondschildrens"][$k3]["iname"] = $secondchild["iname"];
				}
			}
		}
		return $main;
	}
	public function getpermissionadd(){
		$this->db->prepare("SELECT a.name,a.function,i.class,i.name AS iname FROM ".PREFIX."tdcharge_service_action dcsa 
							INNER JOIN ".PREFIX."tservice s ON dcsa.idservice=s.idservice
							INNER JOIN ".PREFIX."taction a ON dcsa.idaction=a.idaction
							INNER JOIN ".PREFIX."ticon i ON a.idicon=i.idicon
							WHERE dcsa.idcharge='".$_SESSION['idcharge']."' AND s.url='".controller."'
							AND a.function=1 ORDER BY a.idaction DESC;");
		$q1 = $this->db->execute();
		$a = $q1->fetchAll();
		foreach ($a as $b){
			if( $b['function'] == '1' ){
				$btnadd ="<div class='row'><div class='col-md-3 col-md-offset-4'><a href='".url_base.controller."/add' class='btn1' data-toggle='tooltip' title='".permission_getpermissionadd_title1.$b['name'].permission_getpermissionadd_title2."'><i class='".$b['class']." ".$b['iname']."'></i> ".$b['name']."</a></div></div>";
			}
		}
		return $btnadd;
	}
	public function getpermission($id,$status='',$not_function=''){
		if(!empty($not_function)){
			$aux = " AND a.function<>'".$not_function."' ";
		}
		$this->db->prepare("SELECT a.name,a.function,i.class,i.name AS iname FROM ".PREFIX."tdcharge_service_action dcsa 
							INNER JOIN ".PREFIX."tservice s ON dcsa.idservice=s.idservice
							INNER JOIN ".PREFIX."taction a ON dcsa.idaction=a.idaction
							INNER JOIN ".PREFIX."ticon i ON a.idicon=i.idicon
							WHERE dcsa.idcharge='".$_SESSION['idcharge']."' AND s.url='".controller."'
							AND (a.function=2 OR a.function=3 OR a.function=4 OR a.function=5 OR a.function=7) ".$aux." ORDER BY a.idaction ASC;");
		$q1 = $this->db->execute();
		$a = $q1->fetchAll();
		$cell="<td>";
		foreach ($a as $b){
			if( $b['function'] == '4' && $status == '1' ){
				@$cell='<a href="'.url_base.controller.'/deactivate/'.$id.'" class="text-muted" data-toggle="tooltip" title="'.permission_getpermission_status_title.'"><i class="'.$b['class'].' '.$b['iname'].' text-success"></i><b>ACTIVO</b></a> ';
			}else if( $b['function'] == '5' && $status == '0' ){
				@$cell='<a href="'.url_base.controller.'/activate/'.$id.'" class="text-muted" data-toggle="tooltip" title="'.permission_getpermission_status_title.'"><i class="'.$b['class'].' '.$b['iname'].' text-danger"></i><b>INACTIVO</b></a> ';
			}else if( empty($cell) && $status != '2'){
				$val = ($status)? 'ACTIVO' : 'INACTIVO';
				@$cell='<b>'.$val.' </b>';
			}
		}		
		foreach ($a as $b) {
			if( $b['function'] == '2' ){
				@$cell.='<a href="'.url_base.controller.'/edit/'.$id.'" class="text-muted" data-toggle="tooltip" title="'.permission_getpermissionadd_title1.$b['name'].permission_getpermissionadd_title2.'"><i class="'.$b['class'].' '.$b['iname'].'"></i></a> ';
			}else if( $b['function'] == '3' ){
				@$cell.='<a href="'.url_base.controller.'/query/'.$id.'" class="text-muted" data-toggle="tooltip" title="'.permission_getpermissionadd_title1.$b['name'].permission_getpermissionadd_title2.'"><i class="'.$b['class'].' '.$b['iname'].'"></i></a> ';
			}else if( $b['function'] == '7'){
				@$cell.='<a href="'.url_base.controller.'/delete/'.$id.'" class="text-muted" data-toggle="tooltip" title="'.permission_getpermissionadd_title1.$b['name'].permission_getpermissionadd_title2.'" onclick="return confirm(\'Estas seguro que deseas eliminar este registro?\')"><i class="'.$b['class'].' '.$b['iname'].'"></i></a> ';
			}
		}
		$cell = ($cell != "<td>")? $cell : permission_getpermission_no_actions;
		$cell.="</td>";
		return $cell;
	}
	public function getpermission_two($id="",$status='',$not_function=''){
		if(!empty($not_function)){
			$aux = " AND a.function<>'".$not_function."' ";
		}
		$this->db->prepare("SELECT a.name,a.function,i.class,i.name AS iname FROM ".PREFIX."tdcharge_service_action dcsa 
							INNER JOIN ".PREFIX."tservice s ON dcsa.idservice=s.idservice
							INNER JOIN ".PREFIX."taction a ON dcsa.idaction=a.idaction
							INNER JOIN ".PREFIX."ticon i ON a.idicon=i.idicon
							WHERE dcsa.idcharge='".$_SESSION['idcharge']."' AND s.url='".controller."'
							AND (a.function='2' OR a.function='3' OR a.function='4' OR a.function='5' OR a.function='7') ".$aux." ORDER BY a.idaction ASC;");
		$this->db->execute();
		$a = $this->db->fetchAll();
		$arr="";
		foreach ($a as $k1 => $val) {
			$arr[$val["function"]] = $val["function"];
		}
		return $arr;
	}
	public function getpermission_action($function){
		if(!is_array($function)){
			$AND = " a.function=".$function."";
		}else{
			$AND = "(";
			foreach ($function as $key => $value) {
				$AND .="a.function=".$value." OR ";
			}
			$AND = substr($AND, 0,-3);
			$AND .=")";
		}
		$this->db->prepare("SELECT a.function FROM ".PREFIX."taction a INNER JOIN ".PREFIX."tdcharge_service_action csa ON a.idaction=csa.idaction INNER JOIN ".PREFIX."tperson p ON csa.idcharge=p.idcharge INNER JOIN ".PREFIX."tservice s ON csa.idservice=s.idservice WHERE csa.idcharge=? AND s.url=? AND ".$AND.";");
		$this->db->execute(array($_SESSION["idcharge"],controller));
		$action = $this->db->fetchAll();
		if(empty($action[0][0])){
			$_SESSION["msj"] = no_permission;
			if($_SESSION["initiated"]=='1'){
				header('location: '.url_base.'home/dashboard');
			}else{
				header('location: '.url_base.'user/profile');
			}
			exit;
		}else if($_SESSION["initiated"]=='0'){
			header('location: '.url_base.'user/profile');
		}
	}
}
?>