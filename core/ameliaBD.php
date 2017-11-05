<?php
namespace core;
require_once("spdo.php");
class ameliaBD{
	private $db,$resource;
	public function __construct(){
		if($_SESSION["environment"]=="1"){
			$_SESSION["DATABASE"] = DB_TEST;
		}else{
			$_SESSION["DATABASE"] = DB_PRODUCTION;
		}
		$this->db = spdo::singleton();
	}
	public function __destruct(){
		$this->db->__destruct();
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
	public function exec_native($sql){
		try{
			return $this->db->exec($sql);
		}catch(PDOException $e){
			echo $e->getCode();
		}
	}
	private function string($sql){
		if(DRIVER == "mysql"){
			/*$sql = str_replace("CONCAT", "", $sql);
			$sql = str_replace("||", ",", $sql);
			$sql = str_replace("TO_CHAR", "DATE_FORMAT", $sql);
			$sql = str_replace("DD", "%d", $sql);
			$sql = str_replace("MM", "%m", $sql);
			$sql = str_replace("YYYY", "%Y", $sql);
			$sql = str_replace("HH24", "%H", $sql);
			$sql = str_replace("HH12", "%h", $sql);
			$sql = str_replace("MI", "%i", substr($sql,0,strpos($sql,"LIMIT"))).substr($sql, strpos($sql,"LIMIT"));
			$sql = str_replace("SS", "%s", $sql);
			$sql = str_replace("AM", "%p", $sql);*/
		}else if(DRIVER == "pgsql"){
			$sql = str_replace("DATE_FORMAT", "TO_CHAR", $sql);
			$sql = str_replace("%d", "DD", $sql);
			$sql = str_replace("%m", "MM", $sql);
			$sql = str_replace("%Y", "YYYY", $sql);
			$sql = str_replace("%H", "HH24", $sql);
			$sql = str_replace("%h", "HH12", $sql);
			$sql = str_replace("%i", "MI", $sql);//substr($sql,0,strpos($sql,"LIMIT"))).substr($sql, strpos($sql,"LIMIT"));
			$sql = str_replace("%s", "SS", $sql);
			$sql = str_replace("%p", "AM", $sql);
			/*$str3 = $sql;
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
			$str = "SELECT ".$str6." FROM ".$str4[1];*/
		}
		return $sql;
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
