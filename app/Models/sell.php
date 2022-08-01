<?php

namespace App\Models;

use App\Traits\CreatedById;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class sell extends Model
{
    use HasFactory ,SoftDeletes,CreatedById;

    protected $table='sells';
    protected $guarded=[];


    /**
     * Get the user that owns the buy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accessory(): BelongsTo
    {
        return $this->belongsTo(accessories::class, 'accessory_id', 'id');
    }
}
