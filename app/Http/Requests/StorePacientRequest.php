<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePacientRequest extends FormRequest
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
            'cnp'=>[
                'required',
                'string',
                'size:13',
                Rule::unique('pacients')->ignore($this->pacient)
            ],
            'age'=>[
                'required',
                'integer'
           ],
            'insurancetype'=>[
              'required',
              'alpha',
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
