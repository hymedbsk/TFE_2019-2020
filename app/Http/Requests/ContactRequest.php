<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'nom' => 'required|min:2|max:20|alpha',
            'prenom' =>'required|min:2|max:20|alpha',
            'email' => 'required|email',
            'texte' => 'required|max:250'
        ];
    }
}


(SQL: select `larapoll_polls`.*, (select count(*) from `larapoll_options` where `larapoll_polls`.`` = `larapoll_options`.`poll_`) as `options_count`, (select count(*) from `larapoll_votes` inner join `larapoll_options` on `larapoll_options`.`` = `larapoll_votes`.`option_` where `larapoll_polls`.`` = `larapoll_options`.`poll_`) as `votes_count` from `larapoll_polls`)