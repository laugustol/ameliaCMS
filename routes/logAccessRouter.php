<?php
//--log_access
  $router->get('log-access',function(){
    define('routerCtrl','log-access');
    define('action','index');
    $ctrl = new controllers\log_accessController;
    $ctrl->index();
  });
  $router->post('log-access/listt',function(){
    $ctrl = new controllers\log_accessController;
    $ctrl->listt();
  });
  $router->get('log-access/delete/:id',function($id){
    define('routerCtrl','log-access');
    define('action','query');
    $ctrl = new controllers\log_accessController;
    $ctrl->delete($id);
  });
  $router->get('log-access/pdf',function(){
    $ctrl = new controllers\log_accessController;
    $ctrl->pdf();
  });
  $router->get('log-access/graph',function(){
    $ctrl = new controllers\log_accessController;
    $ctrl->graph();
  });

  ?>