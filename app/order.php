<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use SoftDeletes;
    protected $fillable =['full_name','phone','adress','city','country','created_by'];

    public static function boot()
    {
        parent::boot();
        if (auth()->check()) {
            static::addGlobalScope('order_created_user', function (Builder $builder) {
                return $builder->where('created_by', auth()->id());
            });
        }
    }
}
