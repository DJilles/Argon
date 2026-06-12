<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Brand extends Model
{
    protected $fillable = [
        "b_name",
        "b_description"
    ];

    public function device_inventory(): HasOne
    {
        return $this->hasOne(DeviceInventory::class);
    }
}
