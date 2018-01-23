<?php
//--organization
  $router->get('organization',function(){
    define('routerCtrl','organization');
    define('action','index');
    $ctrl = new controllers\organizationController;
    $ctrl->index();
  });
  $router->post('organization/listt',function(){
    $ctrl = new controllers\organizationController;
    $ctrl->listt();
  });
  $router->get('organization/add',function(){
    define('routerCtrl','organization');
    define('action','add');
    $ctrl = new controllers\organizationController;
    $ctrl->add();
  });
  $router->post('organization/add/',function(){
    define('routerCtrl','organization');
    define('action','add');
    $ctrl = new controllers\organizationController;
    $ctrl->add();
  });
  $router->get('organization/edit/:id',function($id){
    define('routerCtrl','organization');
    define('action','edit');
    $ctrl = new controllers\organizationController;
    $ctrl->edit($id);
  });
  $router->post('organization/edit/:id',function($id){
    define('routerCtrl','organization');
    define('action','edit');
    $ctrl = new controllers\organizationController;
    $ctrl->edit($id);
  });
  $router->get('organization/query/:id',function($id){
    define('routerCtrl','organization');
    define('action','query');
    $ctrl = new controllers\organizationController;
    $ctrl->query($id);
  });
  $router->get('organization/delete/:id',function($id){
    define('routerCtrl','organization');
    define('action','query');
    $ctrl = new controllers\organizationController;
    $ctrl->delete($id);
  });
  $router->get('organization/activate/:id',function($id){
    define('routerCtrl','organization');
    define('action','query');
    $ctrl = new controllers\organizationController;
    $ctrl->activate($id);
  });
  $router->get('organization/deactivate/:id',function($id){
    define('routerCtrl','organization');
    define('action','query');
    $ctrl = new controllers\organizationController;
    $ctrl->deactivate($id);
  });

  ?>