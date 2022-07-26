<?php

namespace App\Models;

use App\Traits\CreatedById;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class types extends Model
{
    use HasFactory ,SoftDeletes,CreatedById;

    protected $table='types';
    protected $guarded=[];
}
