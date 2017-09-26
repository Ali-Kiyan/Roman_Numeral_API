<?php
class Controller
{

  // providing models
  public function model ($model)
  {
     require_once '../app/models/'. $model . '.php';
     return new $model();
  }
  // providing views
  public function view($view, $data = [])
  {
     require_once '../app/views/' . $view . '.php';
  }
}
?>
