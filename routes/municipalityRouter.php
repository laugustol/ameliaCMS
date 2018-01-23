<?php
//--municipality
  $router->get('municipality',function(){
    define('routerCtrl','municipality');
    define('action','index');
    $ctrl = new controllers\municipalityController;
    $ctrl->index();
  });
  $router->post('municipality/listt',function(){
    $ctrl = new controllers\municipalityController;
    $ctrl->listt();
  });
  $router->get('municipality/add',function(){
    define('routerCtrl','municipality');
    define('action','add');
    $ctrl = new controllers\municipalityController;
    $ctrl->add();
  });
  $router->post('municipality/add/',function(){
    define('routerCtrl','municipality');
    define('action','add');
    $ctrl = new controllers\municipalityController;
    $ctrl->add();
  });
  $router->get('municipality/edit/:id',function($id){
    define('routerCtrl','municipality');
    define('action','edit');
    $ctrl = new controllers\municipalityController;
    $ctrl->edit($id);
  });
  $router->post('municipality/edit/:id',function($id){
    define('routerCtrl','municipality');
    define('action','edit');
    $ctrl = new controllers\municipalityController;
    $ctrl->edit($id);
  });
  $router->get('municipality/query/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->query($id);
  });
  $router->get('municipality/delete/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->delete($id);
  });
  $router->get('municipality/activate/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->activate($id);
  });
  $router->get('municipality/deactivate/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->deactivate($id);
  });
  $router->get('municipality/pdf',function(){
    $ctrl = new controllers\municipalityController;
    $ctrl->pdf();
  });
  $router->post('municipality/search',function(){
    $ctrl = new controllers\municipalityController;
    $ctrl->search();
  });

  ?>