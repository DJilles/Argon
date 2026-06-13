<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DeviceInventory extends Model
{

    protected $table = 'devices_inventories';
    protected $fillable = [
        "inv_num",
        "serial_num",
        "model",
        "inv_condition",
        "device_type_id",
        "brand_id",

    ];

    public function user_dev(): HasOne
    {
        return $this->hasOne(UserDev::class);
    }

    public function device_type() : BelongsTo
    {
        return $this->belongsTo(DeviceType::class);
    }

    public function brand() : BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
