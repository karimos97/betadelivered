<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MultiTenintable;

class order extends Model
{
    use SoftDeletes,MultiTenintable;
    protected $fillable =['full_name','phone','adress','city','country','created_by'];
}
