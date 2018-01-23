<?php
//--gallery
  $router->get('gallery',function(){
    define('routerCtrl','gallery');
    define('action','index');
    $ctrl = new controllers\galleryController;
    $ctrl->index();
  });
  $router->post('gallery/listt',function(){
    $ctrl = new controllers\galleryController;
    $ctrl->listt();
  });
  $router->get('gallery/add',function(){
    define('routerCtrl','gallery');
    define('action','add');
    $ctrl = new controllers\galleryController;
    $ctrl->add();
  });
  $router->post('gallery/add',function(){
    define('routerCtrl','gallery');
    define('action','add');
    $ctrl = new controllers\galleryController;
    $ctrl->add();
  });
  $router->get('gallery/edit/:id',function($id){
    define('routerCtrl','gallery');
    define('action','edit');
    $ctrl = new controllers\galleryController;
    $ctrl->edit($id);
  });
  $router->post('gallery/edit/:id',function($id){
    define('routerCtrl','gallery');
    define('action','edit');
    $ctrl = new controllers\galleryController;
    $ctrl->edit($id);
  });
  $router->post('gallery/query',function($id){
    define('routerCtrl','gallery');
    define('action','query');
    $ctrl = new controllers\galleryController;
    $ctrl->query($id);
  });
  $router->get('gallery/delete/:id',function($id){
    define('routerCtrl','gallery');
    define('action','query');
    $ctrl = new controllers\galleryController;
    $ctrl->delete($id);
  });
  $router->post('gallery/upload',function(){
    define('routerCtrl','gallery');
    define('action','add');
    $ctrl = new controllers\galleryController;
    $ctrl->upload();
  });
  $router->get('gallery/show/:id',function($id){
    define('routerCtrl','gallery');
    $ctrl = new controllers\galleryController;
    $ctrl->show($id);
  });
  $router->post('gallery/show_ajax',function(){
    define('routerCtrl','gallery');
    $ctrl = new controllers\galleryController;
    $ctrl->show_ajax();
  });
  ?>