<?php
//--nationality
  $router->get('nationality',function(){
    define('routerCtrl','nationality');
    define('action','index');
    $ctrl = new controllers\nationalityController;
    $ctrl->index();
  });
  $router->get('nationality/add',function(){
    define('routerCtrl','nationality');
    define('action','add');
    $ctrl = new controllers\nationalityController;
    $ctrl->add();
  });
  $router->post('nationality/add/',function(){
    define('routerCtrl','nationality');
    define('action','add');
    $ctrl = new controllers\nationalityController;
    $ctrl->add();
  });
  $router->get('nationality/edit/:id',function($id){
    define('routerCtrl','nationality');
    define('action','edit');
    $ctrl = new controllers\nationalityController;
    $ctrl->edit($id);
  });
  $router->post('nationality/edit/:id',function($id){
    define('routerCtrl','nationality');
    define('action','edit');
    $ctrl = new controllers\nationalityController;
    $ctrl->edit($id);
  });
  $router->get('nationality/query/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->query($id);
  });
  $router->get('nationality/delete/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->delete($id);
  });
  $router->get('nationality/activate/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->activate($id);
  });
  $router->get('nationality/deactivate/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->deactivate($id);
  });
  $router->get('nationality/pdf',function(){
    $ctrl = new controllers\nationalityController;
    $ctrl->pdf();
  });
  $router->post('nationality/search',function(){
    $ctrl = new controllers\nationalityController;
    $ctrl->search();
  });
?>