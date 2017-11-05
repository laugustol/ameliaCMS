<?php
  namespace core;
  class Router{
    public $urlBase,$routes,$urlBrowser,$status,$key,$id,$notFund;
    public function __construct(){
      $this->urlBase = null;
      $this->routesGet = array();
      $this->routesPost = array();
      $this->urlBrowser = ((isset($_SERVER["HTTPS"]))? 'https://' : 'http://').$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
      $this->status = false;
      $this->key = null;
      $this->id = null;
      $this->notFund = null;
    }
    public function notFund($f){
      if(!$this->status){
        $f();
      }
    }
    public function get($url="",$f=""){
      if($_SERVER["REQUEST_METHOD"]=="GET"){
        $this->routesGet[] = array($url,$f);
        if(!$f){
          echo "errorx";
          exit;
        }
      }
    }
    public function post($url="",$f=""){
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $this->routesPost[] = array($url,$f);
        if(!$f){
          echo "errorx";
          exit;
        }
      }
    }
    private function runGet(){
      $urlBrowserSlit = explode("/",$this->urlBrowser);
      foreach($this->routesGet as $k => $route){
        $urlSlit = explode("/",$this->urlBase.$route[0]);
        for($i=0;$i < count($urlSlit);$i++){
          if($urlSlit[$i]!=$urlBrowserSlit[$i]){
            if($urlSlit[$i] == ":id"){
              $this->id = $urlBrowserSlit[$i];
              $urlSlit[$i] = str_replace($urlSlit[$i],":id",$this->id);
            }
          }
        }
        $route[0] = implode("/",$urlSlit);
        if($route[0] == $this->urlBrowser){
          $this->key = $k;
          $this->status = true;
          break;
        }
      }
      if($this->status){
        $this->routesGet[$this->key][1]($this->id);
      }
    }
    private function runPost(){
      $urlBrowserSlit = explode("/",$this->urlBrowser);
      foreach($this->routesPost as $k => $route){
        $urlSlit = explode("/",$this->urlBase.$route[0]);
        for($i=0;$i < count($urlSlit);$i++){
          if($urlSlit[$i]!=$urlBrowserSlit[$i]){
            if($urlSlit[$i] == ":id"){
              $this->id = $urlBrowserSlit[$i];
              $urlSlit[$i] = str_replace($urlSlit[$i],":id",$this->id);
            }
          }
        }
        $route[0] = implode("/",$urlSlit);
        if($route[0] == $this->urlBrowser){
          $this->key = $k;
          $this->status = true;
          break;
        }
      }
      if($this->status){
        $this->routesPost[$this->key][1]($this->id);
      }
    }
    public function run(){
      if($_SERVER["REQUEST_METHOD"]=="GET"){
          $this->runGet();
      }else if($_SERVER["REQUEST_METHOD"]=="POST"){
        $this->runPost();
      }
    }
  }
?>
