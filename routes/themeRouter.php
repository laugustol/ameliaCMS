<?php
//--theme
  $router->get('theme',function(){
    define('routerCtrl','theme');
    define('action','index');
    $ctrl = new controllers\themeController;
    $ctrl->index();
  });
  $router->post('theme/add/',function(){
    define('routerCtrl','theme');
    define('action','add');
    $ctrl = new controllers\themeController;
    $ctrl->add();
  });
  $router->post('theme/activate/:id',function($id){
    define('routerCtrl','theme');
    define('action','activate');
    $ctrl = new controllers\themeController;
    $ctrl->activate($id);
  });
  ?>