<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $fillable =['name','price','brand','description'];
    public function list()
    {
        $product=new Products();
        return $product::all();
    }
}
