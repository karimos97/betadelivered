<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes; 
    protected $fillable =['id','name','price','brand','description','Qte'];
    public function list()
    {
        $product=new Products();
        return $product::all();
    }
}
