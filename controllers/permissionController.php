<?php
namespace controllers;
class permissionController{
	private $permission,$log_movement;
	public function __construct(){
		define("controller","permission");
		$this->permission = new \Models\permissionModel;
		$this->log_movement = new \Models\log_movementModel;
	}
	public function index(){
		$this->log_movement->add($_SESSION["iduser"],3,7,log_movement_message_list);
		$this->permission->getpermission_action(array(1,2,3,4,5,7));
		$data["dependencies"] = $this->permission->dependencies();
		view("permission.php",1,$data);
	}
	public function listt(){
		echo json_encode($this->permission->listt($_POST["draw"],$_POST["search"]["value"],$_POST["start"],$_POST['length']));
	}
	public function query($id){
		$this->permission->getpermission_action(array(2,3));
		$this->permission->idcharge=$id;
		$data["dependencies"] = $this->permission->dependencies();
		$data["d"] = $this->permission->query();
		$this->log_movement->add($_SESSION["iduser"],3,7,query,"{".id.":'".$id."'}");
		view("permission.php",1,$data);
	}
	public function edit($id){
		$this->permission->getpermission_action(2);
		if(isset($_POST["event"])){
			$this->permission->idcharge = ($_POST["idothercharge"]=='0')? $id : $_POST["idothercharge"];
			if($this->permission->delete()){
				foreach ($_POST["idservices"] as $idservice) {
					$this->permission->idservice = $idservice;
					foreach ($_POST["idactions_".$idservice] as $idaction) {
						$this->permission->idaction = $idaction;
						if($this->permission->add()){
							$_SESSION["msj"] = edit_success;
						}else{
							$_SESSION["msj"] = edit_error;
							break;
						}
					}
				}
			}else{
				$_SESSION["msj"] = delete_error;
			}
			$this->log_movement->add($_SESSION["iduser"],2,7,$_SESSION["msj"]);
			header("location: ".url_base.controller."/edit/".$id);
			exit;
		}
		$this->query($id);
	}
}
?>