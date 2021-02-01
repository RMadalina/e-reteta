<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHospitalRequest extends FormRequest
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
                Rule::unique('hospitals')->ignore($this->hospital)
            ],
            'fiscalcode'=>[
                'required',
                Rule::unique('hospitals')->ignore($this->hospital)
            ],
            'county'=>'required|alpha'
        ];
    }
}
