<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Pacient;
use App\Models\Desease;

class StoreDiagnoseRequest extends FormRequest
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
            'cnp'=>'required',
            //'doctor_id'=>'required',
            'deseasecode'=>'required',

        ];
    }
}
