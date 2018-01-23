<?php
//--serviceHome
  $router->get('service-home',function(){
    define('routerCtrl','service-home');
    define('action','index');
    $ctrl = new controllers\servicehomeController;
    $ctrl->index();
  });
  $router->post('service-home/listt',function(){
    $ctrl = new controllers\servicehomeController;
    $ctrl->listt();
  });
  $router->get('service-home/add',function(){
    define('routerCtrl','service-home');
    define('action','add');
    $ctrl = new controllers\servicehomeController;
    $ctrl->add();
  });
  $router->post('service-home/add/',function(){
    define('routerCtrl','service-home');
    define('action','add');
    $ctrl = new controllers\servicehomeController;
    $ctrl->add();
  });
  $router->get('service-home/edit/:id',function($id){
    define('routerCtrl','service-home');
    define('action','edit');
    $ctrl = new controllers\servicehomeController;
    $ctrl->edit($id);
  });
  $router->post('service-home/edit/:id',function($id){
    define('routerCtrl','service-home');
    define('action','edit');
    $ctrl = new controllers\servicehomeController;
    $ctrl->edit($id);
  });
  $router->get('service-home/query/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\servicehomeController;
    $ctrl->query($id);
  });
  $router->get('service-home/delete/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\servicehomeController;
    $ctrl->delete($id);
  });
  $router->get('service-home/activate/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\servicehomeController;
    $ctrl->activate($id);
  });
  $router->get('service-home/deactivate/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\servicehomeController;
    $ctrl->deactivate($id);
  });
  ?>