<?php
//--log_movement
  $router->get('log-movement',function(){
    define('routerCtrl','log-movement');
    define('action','index');
    $ctrl = new controllers\log_movementController;
    $ctrl->index();
  });
  $router->get('log-movement/delete/:id',function($id){
    define('routerCtrl','log-movement');
    define('action','query');
    $ctrl = new controllers\log_movementController;
    $ctrl->delete($id);
  });
  $router->get('log-movement/pdf',function(){
    $ctrl = new controllers\log_movementController;
    $ctrl->pdf();
  });
  $router->get('log-movement/graph',function(){
    $ctrl = new controllers\log_movementController;
    $ctrl->graph();
  });

  ?>