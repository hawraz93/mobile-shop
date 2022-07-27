<?php

namespace App\Models;

use App\Traits\CreatedById;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class accessories extends Model
{
    use HasFactory,SoftDeletes,CreatedById;

    protected $table='accessories';
    protected $guarded=[];
  


    /**
     * Get the user that owns the accessories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function color(): BelongsTo
    {
        return $this->belongsTo(color::class, 'color_id', 'id');
    }

    /**
     * Get the user that owns the accessories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(devices::class, 'device_id', 'id');
    }


}
