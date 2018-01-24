<?php
  //--contact
  $router->get('contact',function(){
    define('routerCtrl','contact');
    define('action','index');
    $ctrl = new controllers\contactController;
    $ctrl->index();
  });
  $router->get('contact/add',function(){
    define('routerCtrl','contact');
    define('action','add');
    $ctrl = new controllers\contactController;
    $ctrl->add();
  });
  $router->post('contact/add',function(){
    define('routerCtrl','contact');
    define('action','add');
    $ctrl = new controllers\contactController;
    $ctrl->add();
  });
  $router->get('contact/edit/:id',function($id){
    define('routerCtrl','contact');
    define('action','edit');
    $ctrl = new controllers\contactController;
    $ctrl->edit($id);
  });
  $router->post('contact/edit/:id',function($id){
    define('routerCtrl','contact');
    define('action','edit');
    $ctrl = new controllers\contactController;
    $ctrl->edit($id);
  });
  $router->get('contact/query/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->query($id);
  });
  $router->get('contact/delete/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->delete($id);
  });
  $router->get('contact/activate/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->activate($id);
  });
  $router->get('contact/deactivate/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->deactivate($id);
  });

  ?>