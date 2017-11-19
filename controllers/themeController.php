<?php
namespace controllers;
class themeController{
	private $theme,$installtheme,$permission,$log_movement;
	public function __construct(){
		define("controller","theme");
		$this->theme = new \models\themeModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"]["themes_installed"] = $this->theme->dependencies();
		$data["dependencies"]["themes_ids"] = $this->theme->dependencies();
		view("theme.php",1,$data);
	}
	public function add($src){
		$data = file_get_contents(url_api."themes/".$src);
		file_put_contents("themes/".$src, $data);
		$zip = new \ZipArchive;
		$path = substr($src,0,-4);		
		if($zip->open("themes/".$src) === true){
			$zip->extractTo("themes/");
			$zip->close();
			$model = '\themes\\'.$path.'\installthemeModel';
			$this->installtheme = new $model;
			if($this->installtheme->add()){
				unlink("themes/".$path."/installthemeModel.php");
				unlink("themes/".$src);
				$_SESSION["msj"] = theme_add_success;	
			}else{				
				$_SESSION["msj"] = theme_add_error;	
			}
		}else{
			$_SESSION["msj"] = theme_add_error;
		}
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->theme->idtheme=$id;
		$_SESSION["msj"] = ($this->theme->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>