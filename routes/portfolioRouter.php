<?php
  //--Portfolio
  $router->get('portfolio',function(){
    define('routerCtrl','portfolio');
    define('action','index');
    $ctrl = new controllers\portfolioController;
    $ctrl->index();
  });
  $router->post('portfolio/listt',function(){
    $ctrl = new controllers\portfolioController;
    $ctrl->listt();
  });
  $router->get('portfolio/add',function(){
    define('routerCtrl','portfolio');
    define('action','add');
    $ctrl = new controllers\portfolioController;
    $ctrl->add();
  });
  $router->post('portfolio/add/',function(){
    define('routerCtrl','portfolio');
    define('action','add');
    $ctrl = new controllers\portfolioController;
    $ctrl->add();
  });
  $router->get('portfolio/edit/:id',function($id){
    define('routerCtrl','portfolio');
    define('action','edit');
    $ctrl = new controllers\portfolioController;
    $ctrl->edit($id);
  });
  $router->post('portfolio/edit/:id',function($id){
    define('routerCtrl','portfolio');
    define('action','edit');
    $ctrl = new controllers\portfolioController;
    $ctrl->edit($id);
  });
  $router->get('portfolio/query/:id',function($id){
    define('routerCtrl','portfolio');
    define('action','query');
    $ctrl = new controllers\portfolioController;
    $ctrl->query($id);
  });
  $router->get('portfolio/delete/:id',function($id){
    define('routerCtrl','portfolio');
    define('action','query');
    $ctrl = new controllers\portfolioController;
    $ctrl->delete($id);
  });
  $router->get('portfolio/activate/:id',function($id){
    define('routerCtrl','portfolio');
    define('action','query');
    $ctrl = new controllers\portfolioController;
    $ctrl->activate($id);
  });
  $router->get('portfolio/deactivate/:id',function($id){
    define('routerCtrl','portfolio');
    define('action','query');
    $ctrl = new controllers\portfolioController;
    $ctrl->deactivate($id);
  });  

  ?>