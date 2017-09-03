<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatient extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:200',
            'address'  => 'required',
            'phone'    => 'required',
            'age'      => 'required',
            'gender'   => 'required',
            'image'   => 'image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'name'     => $this->get('name'),
            'username' => str_slug($this->get('name')),
            'address'  => $this->get('address'),
            'phone'    => $this->get('phone'),
            'age'      => $this->get('age'),
            'gender'   => $this->get('gender')
        ];

        return $data;
    }
}
