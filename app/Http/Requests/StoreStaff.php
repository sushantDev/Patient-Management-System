<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaff extends FormRequest {

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
            'name'           => 'required|max:200',
            'staff_type'     => 'required',
            'address'        => 'required',
            'phone'          => 'required',
            'email'          => 'required',
            'age'            => 'required',
            'gender'         => 'required',
            'dob'            => 'date|required',
            'marital_status' => 'required',
            'image'          => 'image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'name'           => $this->get('name'),
            'staff_type'     => $this->get('staff_type'),
            'username'       => str_slug($this->get('name')),
            'address'        => $this->get('address'),
            'phone'          => $this->get('phone'),
            'email'          => $this->get('email'),
            'age'            => $this->get('age'),
            'gender'         => $this->get('gender'),
            'dob'            => $this->get('dob'),
            'marital_status' => $this->get('marital_status'),
        ];

        return $data;
    }
}