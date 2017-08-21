<?php
function view($view,$type,$data=array()){
	@extract($data);
	if($type==1){
		require 'views/layout.php';
	}else if($type==2){
		$theme = new \models\themeModel;
		$src = $theme->theme_active();
		require 'themes/'.$src.'layout.php';
	}else if($type==3){
		require 'views/layout_login.php';
	}else if($type==4){
		require 'install/install.php';
	}
}
?>