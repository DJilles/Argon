<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckInLog extends Model
{
    protected $fillable = [
        "in_date",
        "return_condition"
    ];

    public function user_dev(): BelongsTo
    {
        return $this->belongsTo(UserDev::class);
    }


}
