<?php
//--service PROBLEMAS
  $router->get('service',function(){
    define('routerCtrl','service');
    define('action','index');
    $ctrl = new controllers\serviceController;
    $ctrl->index();
  });
  $router->post('service/listt',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->listt();
  });
  $router->get('service/add',function(){
    define('routerCtrl','service');
    define('action','add');
    $ctrl = new controllers\serviceController;
    $ctrl->add();
  });
  $router->post('service/add/',function(){
    define('routerCtrl','service');
    define('action','add');
    $ctrl = new controllers\serviceController;
    $ctrl->add();
  });
  $router->get('service/edit/:id',function($id){
    define('routerCtrl','service');
    define('action','edit');
    $ctrl = new controllers\serviceController;
    $ctrl->edit($id);
  });
  $router->post('service/edit/:id',function($id){
    define('routerCtrl','service');
    define('action','edit');
    $ctrl = new controllers\serviceController;
    $ctrl->edit($id);
  });
  $router->get('service/query/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->query($id);
  });
  $router->get('service/delete/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->delete($id);
  });
  $router->get('service/activate/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->activate($id);
  });
  $router->get('service/deactivate/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->deactivate($id);
  });
  $router->get('service/pdf',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->pdf();
  });
  $router->post('service/delete-ordered',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->delete_ordered();
  });
  $router->post('service/ordered',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->ordered();
  });

?>