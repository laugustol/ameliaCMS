<?php
function view($view,$type,$data=array()){
	@extract($data);
	if($type==1){
		require 'views/layout.php';
	}else if($type==2){
		require 'views/templates/clean-blog/layout.php';
	}else if($type==3){		
		require 'views/layout_login.php';
	}
}
?>