<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoctorRequest extends FormRequest
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
            'name'=>[
                'required',
                new AlphaSpaces,
            ],
            'stampno'=>[
                'required',
                'string',
                Rule::unique('doctors')->ignore($this->doctor)
            ],
            'cascontract'=>[
                'required',
                'string',
                Rule::unique('doctors')->ignore($this->doctor)
           ],
          'email'=> [
            'email',
            'required',
            Rule::unique('users')->ignore($this->user)
           ],
           'password'=>'required',
        ];
    }
}
