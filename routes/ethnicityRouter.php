<?php
//--ethnicity
  $router->get('ethnicity',function(){
    define('routerCtrl','ethnicity');
    define('action','index');
    $ctrl = new controllers\ethnicityController;
    $ctrl->index();
  });
  $router->get('ethnicity/add',function(){
    define('routerCtrl','ethnicity');
    define('action','add');
    $ctrl = new controllers\ethnicityController;
    $ctrl->add();
  });
  $router->post('ethnicity/add/',function(){
    define('routerCtrl','ethnicity');
    define('action','add');
    $ctrl = new controllers\ethnicityController;
    $ctrl->add();
  });
  $router->get('ethnicity/edit/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','edit');
    $ctrl = new controllers\ethnicityController;
    $ctrl->edit($id);
  });
  $router->post('ethnicity/edit/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','edit');
    $ctrl = new controllers\ethnicityController;
    $ctrl->edit($id);
  });
  $router->get('ethnicity/query/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->query($id);
  });
  $router->get('ethnicity/delete/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->delete($id);
  });
  $router->get('ethnicity/activate/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->activate($id);
  });
  $router->get('ethnicity/deactivate/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->deactivate($id);
  });
  $router->get('ethnicity/pdf',function(){
    $ctrl = new controllers\ethnicityController;
    $ctrl->pdf();
  });
  $router->post('ethnicity/search',function(){
    $ctrl = new controllers\ethnicityController;
    $ctrl->search();
  });
  ?>