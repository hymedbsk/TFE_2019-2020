<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$id = $this->user()->id;
        return [
            
        ];

        }
}

