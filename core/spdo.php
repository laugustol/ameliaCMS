<?php
namespace core;
class SPDO extends \PDO{
	private static $instance = null;
	public function __construct(){
		parent::__construct(DRIVER.':host='.HOST.';port='.PORT.';dbname='.DB,USER,PASSWORD);
		parent::setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
	public static function singleton(){
		if(self::$instance == null){
			self::$instance = new self();
		}
		return self::$instance;
	}	
}
?>