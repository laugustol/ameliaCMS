<?php
namespace core;
require_once("config.php");
require_once("spdo.php");
class ameliaBD{
	private $db,$resource;
	public function __construct(){
		$this->db = spdo::singleton();
	}
	public function prepare($sql){
		$sql = $this->string($sql);
		try{
			$this->resource = $this->db->prepare($sql);
		}catch(PDOException $e){
			echo $e->getCode();
		}
	}
	public function execute($array=Array()){
		try{
			$this->resource->execute($array);
			//echo inverso(5) . "\n";
		}catch(PDOException $e){
			$this->errores($e->getCode(),$e->getMessage());
		}
		return $this->resource;
	}
	public function fetchAll(){
		try{
			return $this->resource->fetchAll();
		}catch(PDOException $e){
			echo $e->getCode();
		}
	}
	public function query($sql){
		$sql = $this->string($sql);
		try{
			return $this->db->query($sql);	
		}catch(PDOException $e){
			echo $e->getCode();
		}
	}
	public function prepare_nativo($sql){
		try{
			$this->resource = $this->db->prepare($sql);
		}catch(PDOException $e){
			echo $e->getCode();
		}
	}
	public function query_nativo($sql){
		try{
			return $this->resource->query($sql);	
		}catch(PDOException $e){
			echo $e->getCode();
		}
	}
	private function string($sql){
		$str2 = substr($sql,0,6);
		if($str2 == "SELECT"){
			if(DRIVER == "mysql"){
				$str3 = $sql;
				$str4 = explode("FROM", $str3);
				$str5 = substr($str4[0], 6);
				$str6 = explode(",", $str5);
				$count_str = count($str6);
				for($a=0;$a<$count_str;$a++){
					$str6[$a] = str_replace("||", ",", $str6[$a]);
					if($str6[$a][0]=="(" || $str6[$a][1]=="("){//CONCATENACION
						$str6[$a]= "CONCAT".$str6[$a];
					}else if($str6[$a][0]=="T" || $str6[$a][1]=="T"){//TO_CHAR
						$str6[$a] = str_replace("TO_CHAR", "DATE_FORMAT", $str6[$a]);
						$a++;
						$str6[$a]=str_replace("DD", "%d", $str6[$a]);
						$str6[$a]=str_replace("MM", "%m", $str6[$a]);
						$str6[$a]=str_replace("YYYY", "%Y", $str6[$a]);
						$str6[$a]=str_replace("HH24", "%H", $str6[$a]);
						$str6[$a]=str_replace("HH12", "%h", $str6[$a]);
						$str6[$a]=str_replace("MI", "%i", $str6[$a]);
						$str6[$a]=str_replace("SS", "%s", $str6[$a]);
						$str6[$a]=str_replace("AM", "%p", $str6[$a]);
					}
				}
				$str6 = implode(",",$str6);
				$str = "SELECT ".$str6." FROM ".$str4[1];
			}else if(DRIVER == "pgsql"){
				$str3 = $sql;
				$str3 = str_replace(",' ',", "||' '||", $str3);
				$str3 = str_replace(",'-',", "||'-'||", $str3);
				$str3 = str_replace(",'/',", "||'/'||", $str3);
				$str3 = str_replace(",'+',", "||'+'||", $str3);
				$str3 = str_replace(",'.',", "||'.'||", $str3);
				$str4 = explode("FROM", $str3);
				$str5 = substr($str4[0], 6);				
				$str6 = explode(",", $str5);
				$count_str = count($str6);
				for($a=0;$a<$count_str;$a++){
					if( ($str6[$a][0]=="C" && $str6[$a][1]=="O") || ($str6[$a][1]=="C" && $str6[$a][2]=="O") ){ //CONCAT
						$str6[$a] = str_replace("CONCAT" , "" , $str6[$a]);						
					}else if($str6[$a][0]=="D" || $str6[$a][1]=="D"){ //DATE_FORMAT
						$str6[$a] = str_replace("DATE_FORMAT", "TO_CHAR", $str6[$a]);
						$a++;
						$str6[$a]=str_replace("%d", "DD", $str6[$a]);
						$str6[$a]=str_replace("%m", "MM", $str6[$a]);
						$str6[$a]=str_replace("%Y", "YYYY", $str6[$a]);
						$str6[$a]=str_replace("%H", "HH24", $str6[$a]);
						$str6[$a]=str_replace("%h", "HH12", $str6[$a]);
						$str6[$a]=str_replace("%i", "MI", $str6[$a]);
						$str6[$a]=str_replace("%s", "SS", $str6[$a]);
						$str6[$a]=str_replace("%p", "AM", $str6[$a]);
					}
				}
				$str6 = implode(",",$str6);
				$str = "SELECT ".$str6." FROM ".$str4[1];
			}
		}else{
			$str = $sql;
		}
		return $str;
	}
	private function errores($num,$error){
		//MYSQL	
		if($num == "42S22"){
			preg_match("/'.*'/", $error, $a);
			echo "ERROR, COLUMNA DESCONOCIDAD: ".$a[0];
		}else if($num == "42S02"){
			preg_match("/'.*'/", $error, $a);
			echo "ERROR, NO EXISTE RELACION DE TABLA O VISTA: ".$a[0];
		}else if($num == "42000"){
			preg_match("/'.*'/", $error, $a);
			echo "ERROR DE SINTAXIS CERDA DE: ".$a[0];
		}else if($num == "23000"){
			preg_match("/'.*'/", $error, $a);
			echo "ERROR, EL CAMPO: ".$a[0]." YA CONTIENE ESTE REGISTRO";
		//POSTGRES			
		}else if($num=="42P01"){
			preg_match("/\".*\"/", $error, $a);
			echo "ERROR DE RELACION DE TABLAS: ".$a[0];
		}else if($num == "42601"){
			preg_match("/\".*\"/", $error, $a);
			echo "ERROR DE SINTAXIS CERCA DE: ".$a[0];
		}else if($num == "23505"){
			preg_match("/\".*\"/", $error, $a);
			echo "ERROR, EL CAMPO: ".$a[0]." YA CONTIENE ESTE REGISTRO";
		}
	}
}
?>