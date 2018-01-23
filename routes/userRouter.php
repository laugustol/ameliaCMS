<?php
//--user
  $router->get('user',function(){
    define('routerCtrl','user');
    define('action','index');
    $ctrl = new controllers\userController;
    $ctrl->index();
  });
  $router->post('user/listt',function(){
    $ctrl = new controllers\userController;
    $ctrl->listt();
  });
  $router->get('user/add',function(){
    define('routerCtrl','user');
    define('action','add');
    $ctrl = new controllers\userController;
    $ctrl->add();
  });
  $router->post('user/add/',function(){
    define('routerCtrl','user');
    define('action','add');
    $ctrl = new controllers\userController;
    $ctrl->add();
  });
  $router->get('user/edit/:id',function($id){
    define('routerCtrl','user');
    define('action','edit');
    $ctrl = new controllers\userController;
    $ctrl->edit($id);
  });
  $router->post('user/edit/:id',function($id){
    define('routerCtrl','user');
    define('action','edit');
    $ctrl = new controllers\userController;
    $ctrl->edit($id);
  });
  $router->get('user/query/:id',function($id){
    define('routerCtrl','user');
    define('action','query');
    $ctrl = new controllers\userController;
    $ctrl->query($id);
  });
  $router->get('user/delete/:id',function($id){
    define('routerCtrl','user');
    define('action','query');
    $ctrl = new controllers\userController;
    $ctrl->delete($id);
  });
  $router->get('user/activate/:id',function($id){
    define('routerCtrl','user');
    define('action','query');
    $ctrl = new controllers\userController;
    $ctrl->activate($id);
  });
  $router->get('user/deactivate/:id',function($id){
    define('routerCtrl','user');
    define('action','query');
    $ctrl = new controllers\userController;
    $ctrl->deactivate($id);
  });
  $router->get('user/pdf',function(){
    $ctrl = new controllers\userController;
    $ctrl->pdf();
  });
  $router->post('user/note',function(){
    $ctrl = new controllers\userController;
    $ctrl->note();
  });
  $router->get('profile',function(){
    define('routerCtrl','profile');
    define('action','edit');
    $ctrl = new controllers\userController;
    $ctrl->profile();
  });
  $router->post('profile',function(){
    define('routerCtrl','profile');
    define('action','edit');
    $ctrl = new controllers\userController;
    $ctrl->profile();
  });
  $router->post('profile/initiated',function(){
    define('routerCtrl','profile');
    define('action','edit');
    $ctrl = new controllers\userController;
    $ctrl->initiated();
  });
  $router->post('user/query-questions-answers',function(){
    $ctrl = new controllers\userController;
    $ctrl->query_questions_answers();
  });
  $router->post('user/required-password',function(){
    $ctrl = new controllers\userController;
    $ctrl->required_password();
  });
  $router->post('user/question-answer',function(){
    $ctrl = new controllers\userController;
    $ctrl->question_answer();
  });
  $router->post('user/reset-password/:id',function(){
    define('routerCtrl','user');
    define('action','edit');
    $ctrl = new controllers\userController;
    $ctrl->reset_password($id);
  });
  $router->post('profile/new-password',function(){
    define('routerCtrl','user');
    define('action','edit');
    $ctrl = new controllers\userController;
    $ctrl->reset_password($id);
  });
  ?>