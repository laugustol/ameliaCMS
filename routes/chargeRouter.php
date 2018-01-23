<?php
  $router->get('charge',function(){
    define('routerCtrl','charge');
    define('action','index');
    $ctrl = new controllers\chargeController;
    $ctrl->index();
  });
  $router->post('charge/listt',function(){
    $ctrl = new controllers\chargeController;
    $ctrl->listt();
  });
  $router->get('charge/add',function(){
    define('routerCtrl','charge');
    define('action','add');
    $ctrl = new controllers\chargeController;
    $ctrl->add();
  });
  $router->post('charge/add/',function(){
    define('routerCtrl','charge');
    define('action','add');
    $ctrl = new controllers\chargeController;
    $ctrl->add();
  });
  $router->get('charge/edit/:id',function($id){
    define('routerCtrl','charge');
    define('action','edit');
    $ctrl = new controllers\chargeController;
    $ctrl->edit($id);
  });
  $router->post('charge/edit/:id',function($id){
    define('routerCtrl','charge');
    define('action','edit');
    $ctrl = new controllers\chargeController;
    $ctrl->edit($id);
  });
  $router->get('charge/query/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->query($id);
  });
  $router->get('charge/delete/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->delete($id);
  });
  $router->get('charge/activate/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->activate($id);
  });
  $router->get('charge/deactivate/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->deactivate($id);
  });
  $router->get('charge/pdf',function(){
    $ctrl = new controllers\chargeController;
    $ctrl->pdf();
  });
  
?>