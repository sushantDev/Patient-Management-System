<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointment extends FormRequest {

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
            'name'      => 'required|max:200',
            'address'   => 'required',
            'phone'     => 'required',
            'date'      => 'date|required',
            'time'      => 'required',
            'doctor_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $data = [
            'name'      => $this->get('name'),
            'address'   => $this->get('address'),
            'phone'     => $this->get('phone'),
            'date'      => $this->get('date'),
            'time'      => $this->get('time'),
            'doctor_id' => $this->get('doctor_id')
        ];

        return $data;
    }
}
