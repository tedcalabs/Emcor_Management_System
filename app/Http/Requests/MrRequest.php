<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MrRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'purok' => 'required',
            'barangay' => 'required',
            'city_m' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'branch' => 'required',
            'category' => 'required',
            'acceptd' => 'required',
            'w_stat' => 'required',
            'device_token'=>'required',
        ];
    }
}
