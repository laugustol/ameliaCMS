<?php
  $router->get('action',function(){
    define('routerCtrl','action');
    define('action','index');
    $ctrl = new controllers\actionController;
    $ctrl->index();
  });
  $router->post('action/listt',function(){
    $ctrl = new controllers\actionController;
    $ctrl->listt();
  });
  $router->get('action/add',function(){
    define('routerCtrl','action');
    define('action','add');
    $ctrl = new controllers\actionController;
    $ctrl->add();
  });
  $router->post('action/add/',function(){
    define('routerCtrl','action');
    define('action','add');
    $ctrl = new controllers\actionController;
    $ctrl->add();
  });
  $router->get('action/edit/:id',function($id){
    define('routerCtrl','action');
    define('action','edit');
    $ctrl = new controllers\actionController;
    $ctrl->edit($id);
  });
  $router->post('action/edit/:id',function($id){
    define('routerCtrl','action');
    define('action','edit');
    $ctrl = new controllers\actionController;
    $ctrl->edit($id);
  });
  $router->get('action/query/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->query($id);
  });
  $router->get('action/delete/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->delete($id);
  });
  $router->get('action/activate/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->activate($id);
  });
  $router->get('action/deactivate/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->deactivate($id);
  });
?>