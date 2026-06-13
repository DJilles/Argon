<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDev extends Model
{
    protected $table = 'users_devs';
    protected $fillable = [
        "rol",
        "u_name",
        "surname",
        "gender",
        "career",
        "id_num",
        "contact_num",
        "address",
        "check_out_date",
        "semester",
        "devolution_date_due",
        "device_condition",
        "device_inventory_id",
    ];

    public function device_inventory(): BelongsTo
    {
        return $this->belongsTo(DeviceInventory::class);
    }
}
