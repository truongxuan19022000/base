<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendorRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => $this->id
                ? 'required|email|max:255|unique:users,email,' . $this->id . ',id,deleted_at,NULL'
                : 'required|email|max:255|unique:users,email,NULL,id,deleted_at,NULL|regex: /^\S+@\S+\.\S+$/',
            'password' => 'required|min:6|confirmed|regex: /^[a-zA-Z0-9]+$/',
            'password_confirmation' => 'required|min:6|regex: /^[a-zA-Z0-9]+$/'
        ];
    }
}
