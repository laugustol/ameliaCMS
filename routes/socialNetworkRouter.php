<?php
//$router = new core\router;
//--social_network
  $router->get('social-network',function(){
    define('routerCtrl','social-network');
    define('action','index');
    $ctrl = new controllers\social_networkController;
    $ctrl->index();
  });
  $router->get('social-network/add',function(){
    define('routerCtrl','social-network');
    define('action','add');
    $ctrl = new controllers\social_networkController;
    $ctrl->add();
  });
  $router->post('social-network/add/',function(){
    define('routerCtrl','social-network');
    define('action','add');
    $ctrl = new controllers\social_networkController;
    $ctrl->add();
  });
  $router->get('social-network/edit/:id',function($id){
    define('routerCtrl','social-network');
    define('action','edit');
    $ctrl = new controllers\social_networkController;
    $ctrl->edit($id);
  });
  $router->post('social-network/edit/:id',function($id){
    define('routerCtrl','social-network');
    define('action','edit');
    $ctrl = new controllers\social_networkController;
    $ctrl->edit($id);
  });
  $router->get('social-network/query/:id',function($id){
    define('routerCtrl','social-network');
    define('action','query');
    $ctrl = new controllers\social_networkController;
    $ctrl->query($id);
  });
  $router->get('social-network/delete/:id',function($id){
    define('routerCtrl','social-network');
    define('action','query');
    $ctrl = new controllers\social_networkController;
    $ctrl->delete($id);
  });
  $router->get('social-network/activate/:id',function($id){
    define('routerCtrl','social-network');
    define('action','query');
    $ctrl = new controllers\social_networkController;
    $ctrl->activate($id);
  });
  $router->get('social-network/deactivate/:id',function($id){
    define('routerCtrl','social-network');
    define('action','query');
    $ctrl = new controllers\social_networkController;
    $ctrl->deactivate($id);
  });
?>