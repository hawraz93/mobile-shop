<?php

namespace App\Models;

use App\Traits\CreatedById;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory,CreatedById;

    protected $table='orders';
    protected $guarded=[];


    /**
     * The product that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Products::class , 'orders_products' ,'order_id' ,'product_id')
                    ->withPivot(['quantity' , 'price']);
    }
}
