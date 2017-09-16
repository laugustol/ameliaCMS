<?php
namespace controllers;
require 'themes/basica/language.php';
class portfolioController{
	private $portfolio,$permission,$log_movement;
	public function __construct(){
		$this->portfolio = new \Models\portfolioModel;
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,2,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->portfolio->dependencies();
		view("portfolio.php",1,$data);
	}
	public function data($id=""){
		$this->portfolio->idportfolio=$id;
		$this->portfolio->title=$_POST["title"];
		$this->portfolio->description=$_POST["description"];
		$this->portfolio->idgallery=$_POST["idgallery"];
		$this->portfolio->idpage=$_POST["idpage"];
	}
	public function listt(){
		echo json_encode($this->portfolio->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$_SESSION["msj"] = ($this->portfolio->add())? add_success : add_error;
			$this->log_movement->add($_SESSION["iduser"],1,2,$_SESSION["msj"],"{".id.":'',".portfolio_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->portfolio->dependencies();
		view("portfolio.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->portfolio->idportfolio=$id;
		$data["d"] = $this->portfolio->query();
		$data["dependencies"] = $this->portfolio->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,2,query,"{".id.":'".$id."'}");
		view("portfolio.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			$_SESSION["msj"] = ($this->portfolio->edit())? edit_success : edit_error;
			$this->log_movement->add($_SESSION["iduser"],2,2,$_SESSION["msj"],"{".id.":'".$id."',".portfolio_name.":'".$_POST["name"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->portfolio->idportfolio=$id;
		$_SESSION["msj"] = ($this->portfolio->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->portfolio->idportfolio=$id;
		$_SESSION["msj"] = ($this->portfolio->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->portfolio->idportfolio=$id;
		$_SESSION["msj"] = ($this->portfolio->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,2,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
}
?>