<?php
//--slider
  $router->get('slider',function(){
    define('routerCtrl','slider');
    define('action','index');
    $ctrl = new controllers\sliderController;
    $ctrl->index();
  });
  $router->get('slider/add',function(){
    define('routerCtrl','slider');
    define('action','add');
    $ctrl = new controllers\sliderController;
    $ctrl->add();
  });
  $router->post('slider/add/',function(){
    define('routerCtrl','slider');
    define('action','add');
    $ctrl = new controllers\sliderController;
    $ctrl->add();
  });
  $router->get('slider/edit/:id',function($id){
    define('routerCtrl','slider');
    define('action','edit');
    $ctrl = new controllers\sliderController;
    $ctrl->edit($id);
  });
  $router->post('slider/edit/:id',function($id){
    define('routerCtrl','slider');
    define('action','edit');
    $ctrl = new controllers\sliderController;
    $ctrl->edit($id);
  });
  $router->get('slider/query/:id',function($id){
    define('routerCtrl','slider');
    define('action','query');
    $ctrl = new controllers\sliderController;
    $ctrl->query($id);
  });
  $router->get('slider/delete/:id',function($id){
    define('routerCtrl','slider');
    define('action','query');
    $ctrl = new controllers\sliderController;
    $ctrl->delete($id);
  });
  $router->get('slider/activate/:id',function($id){
    define('routerCtrl','slider');
    define('action','query');
    $ctrl = new controllers\sliderController;
    $ctrl->activate($id);
  });
  $router->get('slider/deactivate/:id',function($id){
    define('routerCtrl','slider');
    define('action','query');
    $ctrl = new controllers\sliderController;
    $ctrl->deactivate($id);
  });
  ?>