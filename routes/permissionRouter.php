<?php
//--Permission
  $router->get('permission',function(){
    define('routerCtrl','permission');
    define('action','index');
    $ctrl = new controllers\permissionController;
    $ctrl->index();
  });
  $router->post('permission/listt',function(){
    $ctrl = new controllers\permissionController;
    $ctrl->listt();
  });
  $router->get('permission/edit/:id',function($id){
    define('routerCtrl','permission');
    define('action','edit');
    $ctrl = new controllers\permissionController;
    $ctrl->edit($id);
  });
  $router->post('permission/edit/:id',function($id){
    define('routerCtrl','permission');
    define('action','edit');
    $ctrl = new controllers\permissionController;
    $ctrl->edit($id);
  });
  $router->get('permission/query/:id',function($id){
    define('routerCtrl','permission');
    define('action','query');
    $ctrl = new controllers\permissionController;
    $ctrl->query($id);
  });
  ?>