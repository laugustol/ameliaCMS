<?php
$router = new core\router;
$router->urlBase = url_base;
if(!is_readable('core/config.php')){
  $router->urlBase = ((isset($_SERVER["HTTPS"]))? 'https://' : 'http://').$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
  $router->get('',function(){
    $ctrl = new install\installController;
    $ctrl->index();
  });
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ctrl = new install\installController;
    $ctrl->installation();
    exit;
  }
  $router->run();
}else{
  $dir = opendir("routes");
  while($file = readdir($dir)){    
      if(!is_dir("routes/".$file)){
        require_once("routes/".$file);
      }
  }
  closedir($dir); 
  $router->run();
  $router->notFund(function(){
    $ctrl = new controllers\homeController;
    $ctrl->e404();
  });
}
?>