<?php
//--post
  $router->get('post',function(){
    define('routerCtrl','post');
    define('action','index');
    $ctrl = new controllers\postController;
    $ctrl->index();
  });
  $router->get('post/add',function(){
    define('routerCtrl','post');
    define('action','add');
    $ctrl = new controllers\postController;
    $ctrl->add();
  });
  $router->post('post/add/',function(){
    define('routerCtrl','post');
    define('action','add');
    $ctrl = new controllers\postController;
    $ctrl->add();
  });
  $router->get('post/edit/:id',function($id){
    define('routerCtrl','post');
    define('action','edit');
    $ctrl = new controllers\postController;
    $ctrl->edit($id);
  });
  $router->post('post/edit/:id',function($id){
    define('routerCtrl','post');
    define('action','edit');
    $ctrl = new controllers\postController;
    $ctrl->edit($id);
  });
  $router->get('post/query/:id',function($id){
    define('routerCtrl','post');
    define('action','query');
    $ctrl = new controllers\postController;
    $ctrl->query($id);
  });
  $router->get('post/delete/:id',function($id){
    define('routerCtrl','post');
    define('action','query');
    $ctrl = new controllers\postController;
    $ctrl->delete($id);
  });
  $router->get('post/activate/:id',function($id){
    define('routerCtrl','post');
    define('action','query');
    $ctrl = new controllers\postController;
    $ctrl->activate($id);
  });
  $router->get('post/deactivate/:id',function($id){
    define('routerCtrl','post');
    define('action','query');
    $ctrl = new controllers\postController;
    $ctrl->deactivate($id);
  });
  $router->get('post/pdf',function(){
    $ctrl = new controllers\postController;
    $ctrl->pdf();
  });
  $router->get('post/show/:id',function(){
    $ctrl = new controllers\postController;
    $ctrl->show($id);
  });
  $router->get('post/page/:id',function(){
    $ctrl = new controllers\postController;
    $ctrl->show($id);
  });

  ?>