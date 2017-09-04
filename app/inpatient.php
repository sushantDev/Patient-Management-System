<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inpatient extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'skills',
        'admit_type',
        'admit_time',
        'medicine',
        'ward_no',
        'room_no',
        'doctor_id',
        'staff_id'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}