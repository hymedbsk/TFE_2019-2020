<?php

namespace App\Http\Controllers;
use Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function getAcc(){

        return view('welcome');
    }
    public function getView(){
        return redirect()->route('welcome');
    }

    public function postForm(ContactRequest $request)
	{
		Mail::send('email_contact', $request->all(), function($message)
		{
			$message->to('hymedboussaklatan@gmail.com')->subject('Contact');
		});

		return view('welcome');
	}
}
