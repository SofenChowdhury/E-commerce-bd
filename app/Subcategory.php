<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name','category_id'];
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
