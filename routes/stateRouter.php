<?php
//--state
  $router->get('state',function(){
    define('routerCtrl','state');
    define('action','index');
    $ctrl = new controllers\stateController;
    $ctrl->index();
  });
  $router->post('state/listt',function(){
    $ctrl = new controllers\stateController;
    $ctrl->listt();
  });
  $router->get('state/add',function(){
    define('routerCtrl','state');
    define('action','add');
    $ctrl = new controllers\stateController;
    $ctrl->add();
  });
  $router->post('state/add/',function(){
    define('routerCtrl','state');
    define('action','add');
    $ctrl = new controllers\stateController;
    $ctrl->add();
  });
  $router->get('state/edit/:id',function($id){
    define('routerCtrl','state');
    define('action','edit');
    $ctrl = new controllers\stateController;
    $ctrl->edit($id);
  });
  $router->post('state/edit/:id',function($id){
    define('routerCtrl','state');
    define('action','edit');
    $ctrl = new controllers\stateController;
    $ctrl->edit($id);
  });
  $router->get('state/query/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->query($id);
  });
  $router->get('state/delete/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->delete($id);
  });
  $router->get('state/activate/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->activate($id);
  });
  $router->get('state/deactivate/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->deactivate($id);
  });
  $router->get('state/pdf',function(){
    $ctrl = new controllers\stateController;
    $ctrl->pdf();
  });
  $router->post('state/search',function(){
    $ctrl = new controllers\stateController;
    $ctrl->search();
  });

  ?>