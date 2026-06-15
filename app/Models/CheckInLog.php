<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckInLog extends Model
{
    protected $fillable = [
        "in_date",
        "return_condition",
        'user_dev_id',
        'device_inventory_id'

    ];

    public function user_dev(): BelongsTo
    {
        return $this->belongsTo(UserDev::class);
    }


}
