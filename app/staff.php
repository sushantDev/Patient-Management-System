<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $fillable = [
        'name',
        'staff_type',
        'username',
        'address',
        'phone',
        'email',
        'age',
        'gender',
        'dob',
        'marital_status'
    ];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = [])
    {
        if ($this->image)
        {
            $this->image->delete();
        }

        return parent::delete($options);
    }
}
