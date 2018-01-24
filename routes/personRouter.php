<?php
//--person
  $router->get('person',function(){
    define('routerCtrl','person');
    define('action','index');
    $ctrl = new controllers\personController;
    $ctrl->index();
  });
  $router->get('person/add',function(){
    define('routerCtrl','person');
    define('action','add');
    $ctrl = new controllers\personController;
    $ctrl->add();
  });
  $router->post('person/add/',function(){
    define('routerCtrl','person');
    define('action','add');
    $ctrl = new controllers\personController;
    $ctrl->add();
  });
  $router->get('person/edit/:id',function($id){
    define('routerCtrl','person');
    define('action','edit');
    $ctrl = new controllers\personController;
    $ctrl->edit($id);
  });
  $router->post('person/edit/:id',function($id){
    define('routerCtrl','person');
    define('action','edit');
    $ctrl = new controllers\personController;
    $ctrl->edit($id);
  });
  $router->get('person/query/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->query($id);
  });
  $router->get('person/delete/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->delete($id);
  });
  $router->get('person/activate/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->activate($id);
  });
  $router->get('person/deactivate/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->deactivate($id);
  });
  $router->get('person/pdf',function(){
    $ctrl = new controllers\personController;
    $ctrl->pdf();
  });
  ?>