<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DeviceType extends Model
{
    protected $fillable = [
        "dev_name",
        "dev_description"
    ];

    public function device_inventory(): HasOne
    {
        return $this->hasOne(DeviceInventory::class);
    }
}
