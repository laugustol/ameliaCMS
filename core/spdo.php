<?php
namespace core;
class SPDO extends \PDO{
	private static $instance = null;
	public function __construct(){
		$connect = DRIVER.':host='.HOST.';port='.PORT.';dbname='.$_SESSION["DATABASE"];
		parent::__construct($connect,USER,PASSWORD);
		parent::setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
	public static function singleton(){
		if(self::$instance == null){
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function __destruct(){ self::$instance = null; }
}
?>