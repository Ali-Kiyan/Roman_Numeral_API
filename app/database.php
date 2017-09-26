<?php

//using eloquent capsule namespace
use Illuminate\Database\Capsule\Manager as Capsule;

//using capsule for connecting to db 

$capsule = new Capsule();

$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => 'localhost:8889',
  'username'  => 'root',
  'password'  => 'root',
  'database'  => 'roman',
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
]);

$capsule->bootEloquent();

?>
