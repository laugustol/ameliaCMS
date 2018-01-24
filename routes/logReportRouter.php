<?php
//--log_report
  $router->get('log-report',function(){
    define('routerCtrl','log-report');
    define('action','index');
    $ctrl = new controllers\log_reportController;
    $ctrl->index();
  });
  $router->get('log-report/pdf',function(){
    $ctrl = new controllers\log_reportController;
    $ctrl->pdf();
  });
  $router->get('log-report/graph',function(){
    $ctrl = new controllers\log_reportController;
    $ctrl->graph();
  });
  ?>