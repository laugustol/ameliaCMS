<?php
//--page
  $router->get('page',function(){
    define('routerCtrl','page');
    define('action','index');
    $ctrl = new controllers\pageController;
    $ctrl->index();
  });
  $router->post('page/listt',function(){
    $ctrl = new controllers\pageController;
    $ctrl->listt();
  });
  $router->get('page/add',function(){
    define('routerCtrl','page');
    define('action','add');
    $ctrl = new controllers\pageController;
    $ctrl->add();
  });
  $router->post('page/add/',function(){
    define('routerCtrl','page');
    define('action','add');
    $ctrl = new controllers\pageController;
    $ctrl->add();
  });
  $router->get('page/edit/:id',function($id){
    define('routerCtrl','page');
    define('action','edit');
    $ctrl = new controllers\pageController;
    $ctrl->edit($id);
  });
  $router->post('page/edit/:id',function($id){
    define('routerCtrl','page');
    define('action','edit');
    $ctrl = new controllers\pageController;
    $ctrl->edit($id);
  });
  $router->get('page/query/:id',function($id){
    define('routerCtrl','page');
    define('action','query');
    $ctrl = new controllers\pageController;
    $ctrl->query($id);
  });
  $router->get('page/delete/:id',function($id){
    define('routerCtrl','page');
    define('action','query');
    $ctrl = new controllers\pageController;
    $ctrl->delete($id);
  });
  $router->get('page/activate/:id',function($id){
    define('routerCtrl','page');
    define('action','query');
    $ctrl = new controllers\pageController;
    $ctrl->activate($id);
  });
  $router->get('page/deactivate/:id',function($id){
    define('routerCtrl','page');
    define('action','query');
    $ctrl = new controllers\pageController;
    $ctrl->deactivate($id);
  });
  $router->get('page/:id',function($id){
    define('routerCtrl','page');
    define('action','query');
    $ctrl = new controllers\pageController;
    $ctrl->show($id);
  });
  ?>