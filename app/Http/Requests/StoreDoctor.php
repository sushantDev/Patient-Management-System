<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctor extends FormRequest {

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
            'name'       => 'required|max:200',
            'address'    => 'required',
            'phone'      => 'required',
            'email'      => 'required|email',
            'age'        => 'required',
            'gender'     => 'required',
            'department' => 'required',
            'image'      => 'image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'name'       => $this->get('name'),
            'username'   => str_slug($this->get('name')),
            'address'    => $this->get('address'),
            'phone'      => $this->get('phone'),
            'email'      => $this->get('email'),
            'age'        => $this->get('age'),
            'gender'     => $this->get('gender'),
            'department' => $this->get('department'),
        ];

        return $data;
    }
}
