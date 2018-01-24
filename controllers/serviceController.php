<?php
namespace controllers;
class serviceController{
	private $service,$permission,$log_movement;
	public function __construct(){
		define("controller","service");
		$this->service = new \models\serviceModel;
		$this->permission = new \models\permissionModel;
		$this->log_movement = new \models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,4,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->service->dependencies();
		$data["dependencies"]["list"] = $this->service->listt();
		view("service.php",1,$data);
	}
	public function data($id=""){
		$this->service->idservice=$id;
		$this->service->idfather=(!empty($_POST["idfather"]))? $_POST["idfather"] : 0;
		$this->service->name=$_POST["name"];
		$this->service->url=$_POST["url"];
		$this->service->idicon=$_POST["idicon"];
		$this->service->color=$_POST["color"];
		$this->service->ordered=$_POST["ordered"];
	}
	public function add(){
		$this->permission->getpermission_action(1);
		if(isset($_POST["event"])){
			$this->data();
			$this->service->add();
			foreach ($_POST["actions"] as $val) { $this->service->idaction[] = $val; }
			if($this->service->addactions()){
				$_SESSION["msj"] = add_success;	
			}else{
				$_SESSION["msj"] = add_error;
			}
			$this->log_movement->add($_SESSION["iduser"],1,4,$_SESSION["msj"],"{".id.":'',".service_father.":'".$_POST["idfather"]."',".service_name.":'".$_POST["name"]."',".service_url.":'".$_POST["url"]."',".service_icon.":'".$_POST["idicon"]."',".service_color.":'".$_POST["color"]."'}");
			header("location: ".url_base.controller."/add");
			exit;
		}
		$data["dependencies"] = $this->service->dependencies();
		view("service.php",1,$data);	
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->service->idservice=$id;
		$data["d"] = $this->service->query();
		$data["dependencies"] = $this->service->dependencies();
		$this->log_movement->add($_SESSION["iduser"],3,4,query,"{".id.":'".$id."'}");
		view("service.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->data($id);
			if($this->service->edit()){
				foreach ($_POST["nodeleteactions"] as $val) { $this->service->idaction[] = $val; }
				if($this->service->deleteactions()){
					unset($this->service->idaction);
					foreach ($_POST["actions"] as $val){ $this->service->idaction[] = $val; }
					$_SESSION["msj"] = ($this->service->addactions())? edit_success : edit_error ;
				}else{
					$_SESSION["msj"] = edit_error;
				}
			}else{
				$_SESSION["msj"] = edit_error;
			}
			$this->log_movement->add($_SESSION["iduser"],2,4,$_SESSION["msj"],"{".id.":'".$id."',".service_father.":'".$_POST["idfather"]."',".service_name.":'".$_POST["name"]."',".service_url.":'".$_POST["url"]."',".service_icon.":'".$_POST["idicon"]."',".service_color.":'".$_POST["color"]."'}");
			header("location: ".url_base.controller."/edit/".$id);
			//exit;
		}
		$this->query($id);
	}
	public function delete($id){
		$this->permission->getpermission_action(7);
		$this->service->idservice=$id;
		$_SESSION["msj"] = ($this->service->delete())? delete_success : delete_error;
		$this->log_movement->add($_SESSION["iduser"],7,4,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function activate($id){
		$this->permission->getpermission_action(4);
		$this->service->idservice=$id;
		$_SESSION["msj"] = ($this->service->status(1))? activate_success : activate_error;
		$this->log_movement->add($_SESSION["iduser"],4,4,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function deactivate($id){
		$this->permission->getpermission_action(5);
		$this->service->idservice=$id;
		$_SESSION["msj"] = ($this->service->status(0))? deactivate_success : deactivate_error;
		$this->log_movement->add($_SESSION["iduser"],5,4,$_SESSION["msj"],"{".id.":'".$id."'}");
		header("location: ".url_base.controller);
	}
	public function pdf(){
		$log_report = new \models\log_reportModel;
		$randon = str_shuffle("012345678900abcdefghijklmnopqrstuvwxyz");
		$log_report->add($_SESSION["iduser"],service,$randon);
		$organization = new \models\organizationModel;
		$org = $organization->query();
		$services = $this->service->pdf();
		require 'pdf/servicePdf.php';
	}
	public function delete_ordered(){
		if(isset($_POST["event"])){
			echo json_encode($this->service->delete_ordered($_SESSION["iduser"]));
		}
	}
	public function ordered(){
		$this->data($_POST["idservice"]);
		echo json_encode($this->service->ordered($_SESSION["iduser"]));
	}
}
?>