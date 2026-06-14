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

    // 1. Diccionario de Roles
    public function getRolCompletoAttribute()
    {
        $roles = [
            't' => 'Profesor',
            's' => 'Estudiante',
            'w' => 'Trabajador del centro'
        ];

        return $roles[$this->rol] ?? 'Desconocido';
    }

    // 2. Diccionario de Género
    public function getGenderCompletoAttribute()
    {
        $genders = [
            'f' => 'Femenino',
            'm' => 'Masculino'
        ];

        return $genders[$this->gender] ?? 'Desconocido';
    }

    // 3. Diccionario de Semestre
    public function getSemesterCompletoAttribute()
    {
        $semesters = [
            '1' => 'I Semestre',
            '2' => 'II Semestre'
        ];

        return $semesters[$this->semester] ?? 'No Aplica / Ninguno';
    }

    public function device_inventory(): BelongsTo
    {
        return $this->belongsTo(DeviceInventory::class);
    }
}
