<?php

namespace App\Validators;

use GuzzleHttp;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class ReCaptcha
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $client = new GuzzleHttp\Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' =>
                    [
                        'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                        'response' => $value
                    ]
            ]
        );

        $body = json_decode((string)$response->getBody());
        return $body->success;
    }
}
