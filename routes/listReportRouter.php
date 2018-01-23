<?php
//--list_report
  $router->get('list-report',function(){
    define('routerCtrl','list-report');
    define('action','index');
    $ctrl = new controllers\list_reportController;
    $ctrl->index();
  });
  $router->get('list-report/query/:id',function($id){
    define('routerCtrl','list-report');
    define('action','query');
    $ctrl = new controllers\list_reportController;
    $ctrl->query($id);
  });
  $router->post('list-report/pdf',function(){
    $ctrl = new controllers\list_reportController;
    $ctrl->pdf();
  });
  ?>