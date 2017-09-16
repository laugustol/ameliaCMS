<?php
namespace controllers;
require 'themes/basica/language.php';
class servicehomeController{
	private $servicehome,$permission,$log_movement;
	public function __construct(){
		$this->servicehome = new \Models\servicehomeModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->servicehome->dependencies();
		view("servicehome.php",1,$data);
	}
	public function data($id=""){
		$this->servicehome->idservicehome=$id;
		$this->servicehome->title=$_POST["title"];
		$this->servicehome->description=$_POST["description"];
		$this->servicehome->idicon=$_POST["idicon"];
		$this->servicehome->idgallery=$_POST["idgallery"];
		$this->servicehome->idpage=$_POST["idpage"];
	}
	public function listt(){
		echo json_encode($this->servicehome->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->servicehome->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,2,$_SESSION["msj"],"{".id.":'',".servicehome_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->servicehome->dependencies();
		view("servicehome.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->servicehome->idservicehome=$id;
		$data["d"] = $this->servicehome->query();
		$data["dependencies"] = $this->servicehome->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,2,query,"{".id.":'".$id."'}");
		view("servicehome.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->servicehome->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".servicehome_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->servicehome->idservicehome=$id;
		$_SESSION["msj"] = ($this->servicehome->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->servicehome->idservicehome=$id;
		$_SESSION["msj"] = ($this->servicehome->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->servicehome->idservicehome=$id;
		$_SESSION["msj"] = ($this->servicehome->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>