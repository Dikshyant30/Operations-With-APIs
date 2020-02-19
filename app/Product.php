<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= 'products';
    protected $fillable=['name','category','price'];
    protected $primaryKey = 'id';
    public $timestamps=false;
   
}
