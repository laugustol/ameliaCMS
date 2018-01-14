<?php
$router = new core\router;
$router->urlBase = url_base;
if(!is_readable('core/config.php')){
  $router->urlBase = ((isset($_SERVER["HTTPS"]))? 'https://' : 'http://').$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
  $router->get('',function(){
    $ctrl = new install\installController;
    $ctrl->index();
  });
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ctrl = new install\installController;
    $ctrl->installation();
    exit;
  }
  $router->run();
}else{
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
  //--action
  $router->get('action',function(){
    define('routerCtrl','action');
    define('action','index');
    $ctrl = new controllers\actionController;
    $ctrl->index();
  });
  $router->post('action/listt',function(){
    $ctrl = new controllers\actionController;
    $ctrl->listt();
  });
  $router->get('action/add',function(){
    define('routerCtrl','action');
    define('action','add');
    $ctrl = new controllers\actionController;
    $ctrl->add();
  });
  $router->post('action/add/',function(){
    define('routerCtrl','action');
    define('action','add');
    $ctrl = new controllers\actionController;
    $ctrl->add();
  });
  $router->get('action/edit/:id',function($id){
    define('routerCtrl','action');
    define('action','edit');
    $ctrl = new controllers\actionController;
    $ctrl->edit($id);
  });
  $router->post('action/edit/:id',function($id){
    define('routerCtrl','action');
    define('action','edit');
    $ctrl = new controllers\actionController;
    $ctrl->edit($id);
  });
  $router->get('action/query/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->query($id);
  });
  $router->get('action/delete/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->delete($id);
  });
  $router->get('action/activate/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->activate($id);
  });
  $router->get('action/deactivate/:id',function($id){
    define('routerCtrl','action');
    define('action','query');
    $ctrl = new controllers\actionController;
    $ctrl->deactivate($id);
  });
  //--charge
  $router->get('charge',function(){
    define('routerCtrl','charge');
    define('action','index');
    $ctrl = new controllers\chargeController;
    $ctrl->index();
  });
  $router->post('charge/listt',function(){
    $ctrl = new controllers\chargeController;
    $ctrl->listt();
  });
  $router->get('charge/add',function(){
    define('routerCtrl','charge');
    define('action','add');
    $ctrl = new controllers\chargeController;
    $ctrl->add();
  });
  $router->post('charge/add/',function(){
    define('routerCtrl','charge');
    define('action','add');
    $ctrl = new controllers\chargeController;
    $ctrl->add();
  });
  $router->get('charge/edit/:id',function($id){
    define('routerCtrl','charge');
    define('action','edit');
    $ctrl = new controllers\chargeController;
    $ctrl->edit($id);
  });
  $router->post('charge/edit/:id',function($id){
    define('routerCtrl','charge');
    define('action','edit');
    $ctrl = new controllers\chargeController;
    $ctrl->edit($id);
  });
  $router->get('charge/query/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->query($id);
  });
  $router->get('charge/delete/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->delete($id);
  });
  $router->get('charge/activate/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->activate($id);
  });
  $router->get('charge/deactivate/:id',function($id){
    define('routerCtrl','charge');
    define('action','query');
    $ctrl = new controllers\chargeController;
    $ctrl->deactivate($id);
  });
  $router->get('charge/pdf',function(){
    $ctrl = new controllers\chargeController;
    $ctrl->pdf();
  });
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
  //--person
  $router->get('person',function(){
    define('routerCtrl','person');
    define('action','index');
    $ctrl = new controllers\personController;
    $ctrl->index();
  });
  $router->post('person/listt',function(){
    $ctrl = new controllers\personController;
    $ctrl->listt();
  });
  $router->get('person/add',function(){
    define('routerCtrl','person');
    define('action','add');
    $ctrl = new controllers\personController;
    $ctrl->add();
  });
  $router->post('person/add/',function(){
    define('routerCtrl','person');
    define('action','add');
    $ctrl = new controllers\personController;
    $ctrl->add();
  });
  $router->get('person/edit/:id',function($id){
    define('routerCtrl','person');
    define('action','edit');
    $ctrl = new controllers\personController;
    $ctrl->edit($id);
  });
  $router->post('person/edit/:id',function($id){
    define('routerCtrl','person');
    define('action','edit');
    $ctrl = new controllers\personController;
    $ctrl->edit($id);
  });
  $router->get('person/query/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->query($id);
  });
  $router->get('person/delete/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->delete($id);
  });
  $router->get('person/activate/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->activate($id);
  });
  $router->get('person/deactivate/:id',function($id){
    define('routerCtrl','person');
    define('action','query');
    $ctrl = new controllers\personController;
    $ctrl->deactivate($id);
  });
  $router->get('person/pdf',function(){
    $ctrl = new controllers\personController;
    $ctrl->pdf();
  });
  //--ethnicity
  $router->get('ethnicity',function(){
    define('routerCtrl','ethnicity');
    define('action','index');
    $ctrl = new controllers\ethnicityController;
    $ctrl->index();
  });
  $router->post('ethnicity/listt',function(){
    $ctrl = new controllers\ethnicityController;
    $ctrl->listt();
  });
  $router->get('ethnicity/add',function(){
    define('routerCtrl','ethnicity');
    define('action','add');
    $ctrl = new controllers\ethnicityController;
    $ctrl->add();
  });
  $router->post('ethnicity/add/',function(){
    define('routerCtrl','ethnicity');
    define('action','add');
    $ctrl = new controllers\ethnicityController;
    $ctrl->add();
  });
  $router->get('ethnicity/edit/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','edit');
    $ctrl = new controllers\ethnicityController;
    $ctrl->edit($id);
  });
  $router->post('ethnicity/edit/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','edit');
    $ctrl = new controllers\ethnicityController;
    $ctrl->edit($id);
  });
  $router->get('ethnicity/query/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->query($id);
  });
  $router->get('ethnicity/delete/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->delete($id);
  });
  $router->get('ethnicity/activate/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->activate($id);
  });
  $router->get('ethnicity/deactivate/:id',function($id){
    define('routerCtrl','ethnicity');
    define('action','query');
    $ctrl = new controllers\ethnicityController;
    $ctrl->deactivate($id);
  });
  $router->get('ethnicity/pdf',function(){
    $ctrl = new controllers\ethnicityController;
    $ctrl->pdf();
  });
  $router->post('ethnicity/search',function(){
    $ctrl = new controllers\ethnicityController;
    $ctrl->search();
  });
  //--icon
  $router->get('icon',function(){
    define('routerCtrl','icon');
    define('action','index');
    $ctrl = new controllers\iconController;
    $ctrl->index();
  });
  $router->post('icon/listt',function(){
    $ctrl = new controllers\iconController;
    $ctrl->listt();
  });
  $router->get('icon/add',function(){
    define('routerCtrl','icon');
    define('action','add');
    $ctrl = new controllers\iconController;
    $ctrl->add();
  });
  $router->post('icon/add/',function(){
    define('routerCtrl','icon');
    define('action','add');
    $ctrl = new controllers\iconController;
    $ctrl->add();
  });
  $router->get('icon/edit/:id',function($id){
    define('routerCtrl','icon');
    define('action','edit');
    $ctrl = new controllers\iconController;
    $ctrl->edit($id);
  });
  $router->post('icon/edit/:id',function($id){
    define('routerCtrl','icon');
    define('action','edit');
    $ctrl = new controllers\iconController;
    $ctrl->edit($id);
  });
  $router->get('icon/query/:id',function($id){
    define('routerCtrl','icon');
    define('action','query');
    $ctrl = new controllers\iconController;
    $ctrl->query($id);
  });
  $router->get('icon/delete/:id',function($id){
    define('routerCtrl','icon');
    define('action','query');
    $ctrl = new controllers\iconController;
    $ctrl->delete($id);
  });
  $router->get('icon/activate/:id',function($id){
    define('routerCtrl','icon');
    define('action','query');
    $ctrl = new controllers\iconController;
    $ctrl->activate($id);
  });
  $router->get('icon/deactivate/:id',function($id){
    define('routerCtrl','icon');
    define('action','query');
    $ctrl = new controllers\iconController;
    $ctrl->deactivate($id);
  });
  $router->get('icon/pdf',function(){
    $ctrl = new controllers\iconController;
    $ctrl->pdf();
  });
  //--service PROBLEMAS
  $router->get('service',function(){
    define('routerCtrl','service');
    define('action','index');
    $ctrl = new controllers\serviceController;
    $ctrl->index();
  });
  $router->post('service/listt',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->listt();
  });
  $router->get('service/add',function(){
    define('routerCtrl','service');
    define('action','add');
    $ctrl = new controllers\serviceController;
    $ctrl->add();
  });
  $router->post('service/add/',function(){
    define('routerCtrl','service');
    define('action','add');
    $ctrl = new controllers\serviceController;
    $ctrl->add();
  });
  $router->get('service/edit/:id',function($id){
    define('routerCtrl','service');
    define('action','edit');
    $ctrl = new controllers\serviceController;
    $ctrl->edit($id);
  });
  $router->post('service/edit/:id',function($id){
    define('routerCtrl','service');
    define('action','edit');
    $ctrl = new controllers\serviceController;
    $ctrl->edit($id);
  });
  $router->get('service/query/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->query($id);
  });
  $router->get('service/delete/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->delete($id);
  });
  $router->get('service/activate/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->activate($id);
  });
  $router->get('service/deactivate/:id',function($id){
    define('routerCtrl','service');
    define('action','query');
    $ctrl = new controllers\serviceController;
    $ctrl->deactivate($id);
  });
  $router->get('service/pdf',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->pdf();
  });
  $router->post('service/delete-ordered',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->delete_ordered();
  });
  $router->post('service/ordered',function(){
    $ctrl = new controllers\serviceController;
    $ctrl->ordered();
  });
  //--social_network
  $router->get('social-network',function(){
    define('routerCtrl','social-network');
    define('action','index');
    $ctrl = new controllers\social_networkController;
    $ctrl->index();
  });
  $router->post('social-network/listt',function(){
    $ctrl = new controllers\social_networkController;
    $ctrl->listt();
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
  //--nationality
  $router->get('nationality',function(){
    define('routerCtrl','nationality');
    define('action','index');
    $ctrl = new controllers\nationalityController;
    $ctrl->index();
  });
  $router->post('nationality/listt',function(){
    $ctrl = new controllers\nationalityController;
    $ctrl->listt();
  });
  $router->get('nationality/add',function(){
    define('routerCtrl','nationality');
    define('action','add');
    $ctrl = new controllers\nationalityController;
    $ctrl->add();
  });
  $router->post('nationality/add/',function(){
    define('routerCtrl','nationality');
    define('action','add');
    $ctrl = new controllers\nationalityController;
    $ctrl->add();
  });
  $router->get('nationality/edit/:id',function($id){
    define('routerCtrl','nationality');
    define('action','edit');
    $ctrl = new controllers\nationalityController;
    $ctrl->edit($id);
  });
  $router->post('nationality/edit/:id',function($id){
    define('routerCtrl','nationality');
    define('action','edit');
    $ctrl = new controllers\nationalityController;
    $ctrl->edit($id);
  });
  $router->get('nationality/query/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->query($id);
  });
  $router->get('nationality/delete/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->delete($id);
  });
  $router->get('nationality/activate/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->activate($id);
  });
  $router->get('nationality/deactivate/:id',function($id){
    define('routerCtrl','nationality');
    define('action','query');
    $ctrl = new controllers\nationalityController;
    $ctrl->deactivate($id);
  });
  $router->get('nationality/pdf',function(){
    $ctrl = new controllers\nationalityController;
    $ctrl->pdf();
  });
  $router->post('nationality/search',function(){
    $ctrl = new controllers\nationalityController;
    $ctrl->search();
  });
  //--country
  $router->get('country',function(){
    define('routerCtrl','country');
    define('action','index');
    $ctrl = new controllers\countryController;
    $ctrl->index();
  });
  $router->post('country/listt',function(){
    $ctrl = new controllers\countryController;
    $ctrl->listt();
  });
  $router->get('country/add',function(){
    define('routerCtrl','country');
    define('action','add');
    $ctrl = new controllers\countryController;
    $ctrl->add();
  });
  $router->post('country/add/',function(){
    define('routerCtrl','country');
    define('action','add');
    $ctrl = new controllers\countryController;
    $ctrl->add();
  });
  $router->get('country/edit/:id',function($id){
    define('routerCtrl','country');
    define('action','edit');
    $ctrl = new controllers\countryController;
    $ctrl->edit($id);
  });
  $router->post('country/edit/:id',function($id){
    define('routerCtrl','country');
    define('action','edit');
    $ctrl = new controllers\countryController;
    $ctrl->edit($id);
  });
  $router->get('country/query/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->query($id);
  });
  $router->get('country/delete/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->delete($id);
  });
  $router->get('country/activate/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->activate($id);
  });
  $router->get('country/deactivate/:id',function($id){
    define('routerCtrl','country');
    define('action','query');
    $ctrl = new controllers\countryController;
    $ctrl->deactivate($id);
  });
  $router->get('country/pdf',function(){
    $ctrl = new controllers\countryController;
    $ctrl->pdf();
  });
  //--state
  $router->get('state',function(){
    define('routerCtrl','state');
    define('action','index');
    $ctrl = new controllers\stateController;
    $ctrl->index();
  });
  $router->post('state/listt',function(){
    $ctrl = new controllers\stateController;
    $ctrl->listt();
  });
  $router->get('state/add',function(){
    define('routerCtrl','state');
    define('action','add');
    $ctrl = new controllers\stateController;
    $ctrl->add();
  });
  $router->post('state/add/',function(){
    define('routerCtrl','state');
    define('action','add');
    $ctrl = new controllers\stateController;
    $ctrl->add();
  });
  $router->get('state/edit/:id',function($id){
    define('routerCtrl','state');
    define('action','edit');
    $ctrl = new controllers\stateController;
    $ctrl->edit($id);
  });
  $router->post('state/edit/:id',function($id){
    define('routerCtrl','state');
    define('action','edit');
    $ctrl = new controllers\stateController;
    $ctrl->edit($id);
  });
  $router->get('state/query/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->query($id);
  });
  $router->get('state/delete/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->delete($id);
  });
  $router->get('state/activate/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->activate($id);
  });
  $router->get('state/deactivate/:id',function($id){
    define('routerCtrl','state');
    define('action','query');
    $ctrl = new controllers\stateController;
    $ctrl->deactivate($id);
  });
  $router->get('state/pdf',function(){
    $ctrl = new controllers\stateController;
    $ctrl->pdf();
  });
  $router->post('state/search',function(){
    $ctrl = new controllers\stateController;
    $ctrl->search();
  });
  //--municipality
  $router->get('municipality',function(){
    define('routerCtrl','municipality');
    define('action','index');
    $ctrl = new controllers\municipalityController;
    $ctrl->index();
  });
  $router->post('municipality/listt',function(){
    $ctrl = new controllers\municipalityController;
    $ctrl->listt();
  });
  $router->get('municipality/add',function(){
    define('routerCtrl','municipality');
    define('action','add');
    $ctrl = new controllers\municipalityController;
    $ctrl->add();
  });
  $router->post('municipality/add/',function(){
    define('routerCtrl','municipality');
    define('action','add');
    $ctrl = new controllers\municipalityController;
    $ctrl->add();
  });
  $router->get('municipality/edit/:id',function($id){
    define('routerCtrl','municipality');
    define('action','edit');
    $ctrl = new controllers\municipalityController;
    $ctrl->edit($id);
  });
  $router->post('municipality/edit/:id',function($id){
    define('routerCtrl','municipality');
    define('action','edit');
    $ctrl = new controllers\municipalityController;
    $ctrl->edit($id);
  });
  $router->get('municipality/query/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->query($id);
  });
  $router->get('municipality/delete/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->delete($id);
  });
  $router->get('municipality/activate/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->activate($id);
  });
  $router->get('municipality/deactivate/:id',function($id){
    define('routerCtrl','municipality');
    define('action','query');
    $ctrl = new controllers\municipalityController;
    $ctrl->deactivate($id);
  });
  $router->get('municipality/pdf',function(){
    $ctrl = new controllers\municipalityController;
    $ctrl->pdf();
  });
  $router->post('municipality/search',function(){
    $ctrl = new controllers\municipalityController;
    $ctrl->search();
  });
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
  //--service_Home
  $router->get('service-home',function(){
    define('routerCtrl','service-home');
    define('action','index');
    $ctrl = new controllers\service_homeController;
    $ctrl->index();
  });
  $router->post('service-home/listt',function(){
    $ctrl = new controllers\service_homeController;
    $ctrl->listt();
  });
  $router->get('service-home/add',function(){
    define('routerCtrl','service-home');
    define('action','add');
    $ctrl = new controllers\service_homeController;
    $ctrl->add();
  });
  $router->post('service-home/add/',function(){
    define('routerCtrl','service-home');
    define('action','add');
    $ctrl = new controllers\service_homeController;
    $ctrl->add();
  });
  $router->get('service-home/edit/:id',function($id){
    define('routerCtrl','service-home');
    define('action','edit');
    $ctrl = new controllers\service_homeController;
    $ctrl->edit($id);
  });
  $router->post('service-home/edit/:id',function($id){
    define('routerCtrl','service-home');
    define('action','edit');
    $ctrl = new controllers\service_homeController;
    $ctrl->edit($id);
  });
  $router->get('service-home/query/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\service_homeController;
    $ctrl->query($id);
  });
  $router->get('service-home/delete/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\service_homeController;
    $ctrl->delete($id);
  });
  $router->get('service-home/activate/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\service_homeController;
    $ctrl->activate($id);
  });
  $router->get('service-home/deactivate/:id',function($id){
    define('routerCtrl','service-home');
    define('action','query');
    $ctrl = new controllers\service_homeController;
    $ctrl->deactivate($id);
  });
  //--list_report
  $router->get('list_report',function(){
    define('routerCtrl','list_report');
    define('action','index');
    $ctrl = new controllers\list_reportController;
    $ctrl->index();
  });
  $router->get('list_report/query/:id',function($id){
    define('routerCtrl','list_report');
    define('action','query');
    $ctrl = new controllers\list_reportController;
    $ctrl->query($id);
  });
  $router->get('list_report/pdf',function(){
    $ctrl = new controllers\list_reportController;
    $ctrl->pdf();
  });
  //--log_access
  $router->get('log_access',function(){
    define('routerCtrl','log_access');
    define('action','index');
    $ctrl = new controllers\log_accessController;
    $ctrl->index();
  });
  $router->post('log_access/listt',function(){
    $ctrl = new controllers\log_accessController;
    $ctrl->listt();
  });
  $router->get('log_access/delete/:id',function($id){
    define('routerCtrl','log_access');
    define('action','query');
    $ctrl = new controllers\log_accessController;
    $ctrl->delete($id);
  });
  $router->get('log_access/pdf',function(){
    $ctrl = new controllers\log_accessController;
    $ctrl->pdf();
  });
  //--log_movement
  $router->get('log_movement',function(){
    define('routerCtrl','log_movement');
    define('action','index');
    $ctrl = new controllers\log_movementController;
    $ctrl->index();
  });
  $router->post('log_movement/listt',function(){
    $ctrl = new controllers\log_movementController;
    $ctrl->listt();
  });
  $router->get('log_movement/delete/:id',function($id){
    define('routerCtrl','log_movement');
    define('action','query');
    $ctrl = new controllers\log_movementController;
    $ctrl->delete($id);
  });
  $router->get('log_movement/pdf',function(){
    $ctrl = new controllers\log_movementController;
    $ctrl->pdf();
  });
  //--log_report
  $router->get('log_report',function(){
    define('routerCtrl','log_report');
    define('action','index');
    $ctrl = new controllers\log_reportController;
    $ctrl->index();
  });
  $router->post('log_report/listt',function(){
    $ctrl = new controllers\log_reportController;
    $ctrl->listt();
  });
  $router->get('log_report/pdf',function(){
    $ctrl = new controllers\log_reportController;
    $ctrl->pdf();
  });
  //--organization
  $router->get('organization',function(){
    define('routerCtrl','organization');
    define('action','index');
    $ctrl = new controllers\organizationController;
    $ctrl->index();
  });
  $router->post('organization/edit',function(){
    define('routerCtrl','organization');
    define('action','edit');
    $ctrl = new controllers\organizationController;
    $ctrl->edit();
  });
  //--slider
  $router->get('slider',function(){
    define('routerCtrl','slider');
    define('action','index');
    $ctrl = new controllers\sliderController;
    $ctrl->index();
  });
  $router->post('slider/listt',function(){
    $ctrl = new controllers\sliderController;
    $ctrl->listt();
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
  //--theme
  $router->get('theme',function(){
    define('routerCtrl','theme');
    define('action','index');
    $ctrl = new controllers\themeController;
    $ctrl->index();
  });
  $router->post('theme/add/',function(){
    define('routerCtrl','theme');
    define('action','add');
    $ctrl = new controllers\themeController;
    $ctrl->add();
  });
  $router->post('theme/activate/:id',function($id){
    define('routerCtrl','theme');
    define('action','activate');
    $ctrl = new controllers\themeController;
    $ctrl->activate($id);
  });
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
  //--notice
  $router->get('notice',function(){
    define('routerCtrl','notice');
    define('action','index');
    $ctrl = new controllers\noticeController;
    $ctrl->index();
  });
  $router->post('notice/listt',function(){
    $ctrl = new controllers\noticeController;
    $ctrl->listt();
  });
  $router->get('notice/add',function(){
    define('routerCtrl','notice');
    define('action','add');
    $ctrl = new controllers\noticeController;
    $ctrl->add();
  });
  $router->post('notice/add/',function(){
    define('routerCtrl','notice');
    define('action','add');
    $ctrl = new controllers\noticeController;
    $ctrl->add();
  });
  $router->get('notice/edit/:id',function($id){
    define('routerCtrl','notice');
    define('action','edit');
    $ctrl = new controllers\noticeController;
    $ctrl->edit($id);
  });
  $router->post('notice/edit/:id',function($id){
    define('routerCtrl','notice');
    define('action','edit');
    $ctrl = new controllers\noticeController;
    $ctrl->edit($id);
  });
  $router->get('notice/query/:id',function($id){
    define('routerCtrl','notice');
    define('action','query');
    $ctrl = new controllers\noticeController;
    $ctrl->query($id);
  });
  $router->get('notice/delete/:id',function($id){
    define('routerCtrl','notice');
    define('action','query');
    $ctrl = new controllers\noticeController;
    $ctrl->delete($id);
  });
  $router->get('notice/activate/:id',function($id){
    define('routerCtrl','notice');
    define('action','query');
    $ctrl = new controllers\noticeController;
    $ctrl->activate($id);
  });
  $router->get('notice/deactivate/:id',function($id){
    define('routerCtrl','notice');
    define('action','query');
    $ctrl = new controllers\noticeController;
    $ctrl->deactivate($id);
  });
  //--contact
  $router->get('contact',function(){
    define('routerCtrl','contact');
    define('action','index');
    $ctrl = new controllers\contactController;
    $ctrl->index();
  });
  $router->post('contact/listt',function(){
    $ctrl = new controllers\contactController;
    $ctrl->listt();
  });
  $router->get('contact/add',function(){
    define('routerCtrl','contact');
    define('action','add');
    $ctrl = new controllers\contactController;
    $ctrl->add();
  });
  $router->post('contact/add',function(){
    define('routerCtrl','contact');
    define('action','add');
    $ctrl = new controllers\contactController;
    $ctrl->add();
  });
  $router->get('contact/edit/:id',function($id){
    define('routerCtrl','contact');
    define('action','edit');
    $ctrl = new controllers\contactController;
    $ctrl->edit($id);
  });
  $router->post('contact/edit/:id',function($id){
    define('routerCtrl','contact');
    define('action','edit');
    $ctrl = new controllers\contactController;
    $ctrl->edit($id);
  });
  $router->get('contact/query/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->query($id);
  });
  $router->get('contact/delete/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->delete($id);
  });
  $router->get('contact/activate/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->activate($id);
  });
  $router->get('contact/deactivate/:id',function($id){
    define('routerCtrl','contact');
    define('action','query');
    $ctrl = new controllers\contactController;
    $ctrl->deactivate($id);
  });
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
  //--Permission
  $router->get('permission',function(){
    define('routerCtrl','permission');
    define('action','index');
    $ctrl = new controllers\permissionController;
    $ctrl->index();
  });
  $router->post('permission/listt',function(){
    $ctrl = new controllers\permissionController;
    $ctrl->listt();
  });
  $router->get('permission/edit/:id',function($id){
    define('routerCtrl','permission');
    define('action','edit');
    $ctrl = new controllers\permissionController;
    $ctrl->edit($id);
  });
  $router->post('permission/edit/:id',function($id){
    define('routerCtrl','permission');
    define('action','edit');
    $ctrl = new controllers\permissionController;
    $ctrl->edit($id);
  });
  $router->get('permission/query/:id',function($id){
    define('routerCtrl','permission');
    define('action','query');
    $ctrl = new controllers\permissionController;
    $ctrl->query($id);
  });
  //--post
  $router->get('post',function(){
    define('routerCtrl','post');
    define('action','index');
    $ctrl = new controllers\postController;
    $ctrl->index();
  });
  $router->post('post/listt',function(){
    $ctrl = new controllers\postController;
    $ctrl->listt();
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
  $router->run();
  $router->notFund(function(){
    $ctrl = new controllers\homeController;
    $ctrl->e404();
  });
}
?>