<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait CreatedById{

    public static function bootCreatedById(){

       if (auth()->check()) {
            static::creating(function ($model){
                $model->user_id=auth()->id();
            });
            // static::addGlobalScope('user_id',function (Builder $builder){
            //    if (auth()->check()) {
            //     return $builder->where('user_id', auth()->id());
            //    }
            // });
       }
      
    }
}