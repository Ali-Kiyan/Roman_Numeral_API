<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Number extends Eloquent
{
   //adding fillables to writing in the db
   protected $fillable = ['number', 'roman'];
}
