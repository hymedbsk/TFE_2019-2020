<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
			'Titre' => 'required|max:100|min:10',
            'Description' => 'required|max:200|min:10',
            'Nom_doc' => ' required|mimes:docx,pdf,xlsx,ppt,txt|max:10000'
		];
    }
}
