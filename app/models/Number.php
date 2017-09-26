<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Number extends Eloquent
{
   public $name;
   protected $fillable = ['number', 'roman'];
}
