<?php
namespace controllers;
require 'themes/basica/language.php';
class sliderController{
	private $slider,$permission,$log_movement;
	public function __construct(){
		$this->slider = new \Models\sliderModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->slider->dependencies();
		view("slider.php",1,$data);
	}
	public function data($id=""){
		$this->slider->idslider=$id;
		$this->slider->name=$_POST["name"];
	}
	public function listt(){
		echo json_encode($this->slider->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$this->slider->add();
			foreach ($_POST["idgallery"] as $k => $val) {
				$this->slider->idgallery[] = $val;
				$this->slider->title[] = $_POST["title"][$k];
				$this->slider->description[] = $_POST["description"][$k];
				$this->slider->idpage[] = $_POST["idpage"][$k];
			}
			if($this->slider->addimgs()){
				$_SESSION["msj"] = add_success;	
			}else{
				$_SESSION["msj"] = add_error;
			}
			//$this->log_movement->add($_SESSION["iduser"],1,2,$_SESSION["msj"],"{".id.":'',".slider_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->slider->dependencies();
		view("slider.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->slider->idslider=$id;
		$data["d"] = $this->slider->query();
		$data["dependencies"] = $this->slider->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,2,query,"{".id.":'".$id."'}");
		view("slider.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			if($this->slider->edit()){
				if($this->slider->deleteimgs()){
					foreach ($_POST["idgallery"] as $k => $val) {
						$this->slider->idgallery[] = $val;
						$this->slider->title[] = $_POST["title"][$k];
						$this->slider->description[] = $_POST["description"][$k];
						$this->slider->idpage[] = $_POST["idpage"][$k];
					}
					$_SESSION["msj"] = ($this->slider->addimgs())? edit_success : edit_error ;
				}
			}else{
				$_SESSION["msj"] = edit_error;
			}
			/*$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".slider_name.":'".$_POST["name"]."'}");*/
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->slider->idslider=$id;
		$_SESSION["msj"] = ($this->slider->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->slider->idslider=$id;
		$_SESSION["msj"] = ($this->slider->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->slider->idslider=$id;
		$_SESSION["msj"] = ($this->slider->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>