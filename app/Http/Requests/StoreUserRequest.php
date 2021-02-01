<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name'=> [
                'required',
                new AlphaSpaces,
            ],
            'email'=> [
                'email',
                'required',
                Rule::unique('users')->ignore($this->pacient->user)
            ],
            'role_id'=> [
                'integer',
                'required',
             ],
        
        ];
    }
}
