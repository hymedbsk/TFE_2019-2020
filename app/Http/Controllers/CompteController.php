<?php

namespace App\Http\Controllers;

use Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\User;

class CompteController extends Controller
{

        public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('supp', compact('user'));
    }

	public function destroy(Request $request)
    {
        Mail::send('suppConfirm', $request->all(), function($message)
		{
			$message->to('hymedboussaklatan@gmail.com')->subject('Contact');
		});

		return view('confirm');
    }
}
