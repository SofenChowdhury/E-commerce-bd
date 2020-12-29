<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','image','price','description','additional_info','category_id','subcategory_id'];
}