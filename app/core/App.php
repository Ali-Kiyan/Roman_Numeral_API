<?php

class App
{
    //
    protected $params = [];
    public function __construct()
    {
      //broken up sanitized $url
     $url =  $this->parseUrl();
     if(file_exists('../app/controllers/'. $url[0] . '.php')){
      $this->controller = $url[0];
      unset($url[0]);
     }
     require_once '../app/controllers/' . $this->controller . '.php';
     $this->controller = new $this->controller;
     if(isset($url[1]))
     {
       if(method_exists($this->controller, $url[1]))
       {
         $this->method = $url[1];
         unset($url[1]);
       }
     }
     $this->params = $url ? array_values($url) : [];
     call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseUrl()
    {
      //routing with htaccess file
      if(isset($_GET['url'])){
         //trim, sanitize, and making an array of passed controllers and methods to the url
         return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
      }
    }
}

?>
