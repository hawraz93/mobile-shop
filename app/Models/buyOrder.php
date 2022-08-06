<?php

namespace App\Models;

use App\Traits\CreatedById;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class buyOrder extends Model
{
    use HasFactory,SoftDeletes,CreatedById;

    protected $table='buy_orders';
    protected $guarded=[];

  const PRICETYPE =[
       '$' =>'$',
       'IQD' =>'IQD',
  ];


  public function getDataForOrderAttribute()
  {
      return $this->data->format('ymd');
  }


}
