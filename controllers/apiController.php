<?php
namespace controllers;
class apiController{
	private $notice,$theme;
	public function __construct(){
		header('Access-Control-Allow-Origin: *'); 
		header("Access-Control-Allow-Credentials: true");
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header('Access-Control-Max-Age: 1000');
		header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
	}
	public function news(){
		$this->notice = new \models\noticeModel;
		echo json_encode($this->notice->list_news());
	}
	public function themes(){
		$this->theme = new \models\themeModel;
		echo json_encode($this->theme->list_themes($_POST["ids"],$_POST["pagination"]));
	}
}
?>