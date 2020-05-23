<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgRequest extends FormRequest
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
            'nom' => 'required|min:3|max:15|alpha',
            'annee' =>'required|min:9|max:9',
        ];
    }
}
