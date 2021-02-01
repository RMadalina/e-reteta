<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMedicineRequest extends FormRequest
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
          'medicinecode'=>[
            'required',
            'numeric',
        ],
            'name'=> [
                'required',
                new AlphaSpaces,
                Rule::unique('medicines')->ignore($this->medicine)
            ],
            
            'price'=>['required',
            'numeric'
            ]
        ];
    }
}
