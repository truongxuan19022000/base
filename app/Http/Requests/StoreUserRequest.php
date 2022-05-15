<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'company_name' => 'required|max:255',
            'member_employee' => 'required|max:20|regex:/^[0-9]+$/',
            'phone' => 'required|max:20|regex:/^[0-9]+$/',
            'postal_code' => 'required|max:255|regex:/^[0-9]+$/',
            'email' => $this->id
                ? 'required|email|max:255|unique:users,email,' . $this->id . ',id,deleted_at,NULL'
                : 'required|email|max:255|unique:users,email,NULL,id,deleted_at,NULL',
            'province_name' => 'required|max:255',
            'district_name' => 'required|max:255',
            'address' => 'required|max:255',
            'surname_kana' => 'required|max:255',
            'name_kana' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
