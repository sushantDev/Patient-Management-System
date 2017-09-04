<?php

namespace App\Http\Requests;


class UpdateInpatient extends StoreInpatient
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
