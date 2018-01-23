<?php
//--country
  $router->get('country',function(){
    define('routerCtrl','country');
    define('action','index');
    $ctrl = new controllers\countryController;
    $ctrl->index();
  });
  $router->post('country/listt',function(){
    $ctrl = new controllers\countryController;
    $ctrl->listt();
  });
  $router->get('country/add',function(){
    define('routerCtrl','country');
    define('action','add');
    $ctrl = new controllers\countryController;
    $ctrl->add();
  });
  $router->post('country/add/',function(){
    define('routerCtrl','country');
    define('action','add');
    $ctrl = new controllers\countryController;
    $ctrl->add();
  });
  $router->get('country/edit/:id',function($id){
    define('routerCtrl','country');
    define('action','edit');
    $ctrl = new controllers\countryController;
    $ctrl->edit($id);
  });
  $router->post('country/edit/:id',function($id){
    define('routerCtrl','country');
    define('action','edit');
    $ctrl = new controllers\countryController;
    $ctrl->edit($id);
  });
  $router->get('country/query/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->query($id);
  });
  $router->get('country/delete/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->delete($id);
  });
  $router->get('country/activate/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->activate($id);
  });
  $router->get('country/deactivate/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->deactivate($id);
  });
  $router->get('country/pdf',function(){
    $ctrl = new controllers\countryController;
    $ctrl->pdf();
  });

  ?>