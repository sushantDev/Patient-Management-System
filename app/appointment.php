<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'date',
        'time',
        'doctor_id'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
