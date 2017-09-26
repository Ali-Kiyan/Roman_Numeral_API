<?php

class App
{
    //
    protected $params = [];
    public function __construct()
    {
      //broken up,sanitized $url
     $url =  $this->parseUrl();
     //capturing controller
     if(file_exists('../app/controllers/'. $url[0] . '.php')){
      $this->controller = $url[0];
      //unsetting the url for security reasons
      unset($url[0]);
     }
     require_once '../app/controllers/' . $this->controller . '.php';
     //instanciating
     $this->controller = new $this->controller;
     //  capturing and checking the availability of method
     if(isset($url[1]))
     {
       if(method_exists($this->controller, $url[1]))
       {
         $this->method = $url[1];
         //unsetting the url for security reasons
         unset($url[1]);
       }
     }
     //forming a new array based of new values if exists
     $this->params = $url ? array_values($url) : [];
     //take the array containg the controller and the method and pass true the second argument which is params  
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
