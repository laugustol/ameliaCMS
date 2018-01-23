<?php
//--editor
  $router->get('editor',function(){
    define('routerCtrl','editor');
    define('codeeditor','index');
    $ctrl = new controllers\editorController;
    $ctrl->index();
  });
  $router->post('editor/edit/:id',function($id){
    define('routerCtrl','editor');
    define('editor','edit');
    $ctrl = new controllers\editorController;
    $ctrl->edit($id);
  });
  $router->post('editor/search',function(){
    $ctrl = new controllers\editorController;
    $ctrl->search();
  });

  ?>