<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'image' => ['required', 'image'],
        ];
    }
}
