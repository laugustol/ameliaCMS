<?php
$router->get('',function(){
    $ctrl = new controllers\homeController;
    $ctrl->index();
  });
  //--home
  $router->get('login',function(){
    $ctrl = new controllers\homeController;
    $ctrl->login();
  });
  $router->post('login',function(){
    $ctrl = new controllers\homeController;
    $ctrl->login();
  });
  $router->get('forgot',function(){
    $ctrl = new controllers\homeController;
    $ctrl->forgot_password();
  });
  $router->post('forgot',function(){
    $ctrl = new controllers\homeController;
    $ctrl->forgot_password();
  });
  $router->get('dashboard',function($id){
    $ctrl = new controllers\homeController;
    $ctrl->dashboard();
  });
  $router->get('logout',function(){
    $ctrl = new controllers\homeController;
    $ctrl->logout();
  });
  $router->get('forgot-password',function(){
    $ctrl = new controllers\homeController;
    $ctrl->forgot_password();
  });
  $router->post('forgot-password',function(){
    $ctrl = new controllers\homeController;
    $ctrl->forgot_password();
  });

  ?>