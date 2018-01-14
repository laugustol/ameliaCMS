<?php
namespace controllers;
class editorController{
	private $editor,$permission,$log_movement;
	public function __construct(){
		define("controller","editor");
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		function listt($d){
			$dir = opendir($d);
			$GLOBALS["a"].="<ul>";
			while($file = readdir($dir)){    
			    if(is_dir($d."/".$file)){
			    	if($file!="." && $file!=".."){
			        	$GLOBALS["a"].="<li>".$file;
			        	listt($d."/".$file);
			        	$GLOBALS["a"].="</li>";
			    	}
			    }else{
			    	$arr = explode(".", $file);
			    	$GLOBALS["a"].="<li data-jstree='{\"type\":\"".end($arr)."\"}' onclick='file(\"".$d."/".$file."\");'>".$file."</li>";
			    }
			}
			$GLOBALS["a"].="</ul>";
			closedir($dir);
		}
		listt(".");
		$data["dependencies"]["folders"] = $GLOBALS["a"];
		unset($GLOBALS["a"]);
		view("editor.php",1,$data);
	}
	public function search(){
		$fp = fopen($_POST["url"], "r");
		$line="";
		while(!feof($fp)) {
			$line.= fgets($fp);
		}
		fclose($fp);
		echo $line;
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		$fp = fopen($_POST["url"], "w");
		fputs($fp, $_POST["code"]);
		fclose($fp);
		//$_SESSION["msj"] = ($this->editor->edit())? edit_success : edit_error;
		//$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".editor_name.":'".$_POST["name"]."'}");
		header("location: ".url_base.controller);
		exit;
	}
}
?>