<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use SoftDeletes;
    protected $fillable =['full_name','phone','adress','city','country'];
}
