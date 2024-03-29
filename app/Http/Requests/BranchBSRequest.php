<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchBSRequest extends FormRequest
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
            'fname' => 'required|string',
            'lname' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
    }
}
