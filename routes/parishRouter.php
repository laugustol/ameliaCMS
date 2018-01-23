<?php
 //--parish PROBLEMAS
  $router->get('parish',function(){
    define('routerCtrl','parish');
    define('action','index');
    $ctrl = new controllers\parishController;
    $ctrl->index();
  });
  $router->post('parish/listt',function(){
    $ctrl = new controllers\parishController;
    $ctrl->listt();
  });
  $router->get('parish/add',function(){
    define('routerCtrl','parish');
    define('action','add');
    $ctrl = new controllers\parishController;
    $ctrl->add();
  });
  $router->post('parish/add/',function(){
    define('routerCtrl','parish');
    define('action','add');
    $ctrl = new controllers\parishController;
    $ctrl->add();
  });
  $router->get('parish/edit/:id',function($id){
    define('routerCtrl','parish');
    define('action','edit');
    $ctrl = new controllers\parishController;
    $ctrl->edit($id);
  });
  $router->post('parish/edit/:id',function($id){
    define('routerCtrl','parish');
    define('action','edit');
    $ctrl = new controllers\parishController;
    $ctrl->edit($id);
  });
  $router->get('parish/query/:id',function($id){
    define('routerCtrl','parish');
    define('action','query');
    $ctrl = new controllers\parishController;
    $ctrl->query($id);
  });
  $router->get('parish/delete/:id',function($id){
    define('routerCtrl','parish');
    define('action','query');
    $ctrl = new controllers\parishController;
    $ctrl->delete($id);
  });
  $router->get('parish/activate/:id',function($id){
    define('routerCtrl','parish');
    define('action','query');
    $ctrl = new controllers\parishController;
    $ctrl->activate($id);
  });
  $router->get('parish/deactivate/:id',function($id){
    define('routerCtrl','parish');
    define('action','query');
    $ctrl = new controllers\parishController;
    $ctrl->deactivate($id);
  });
  $router->get('parish/pdf',function(){
    $ctrl = new controllers\parishController;
    $ctrl->pdf();
  });
  $router->post('parish/search',function(){
    $ctrl = new controllers\parishController;
    $ctrl->search();
  });
  $router->post('parish/search_m',function(){
    $ctrl = new controllers\parishController;
    $ctrl->search_m();
  });
  ?>