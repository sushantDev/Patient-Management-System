<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $fillable = [
        'name',
        'username',
        'address',
        'phone',
        'age',
        'gender'
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