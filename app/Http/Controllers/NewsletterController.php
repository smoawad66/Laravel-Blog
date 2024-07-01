<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;
use Exception;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {

        request()->validate(['email' => ['required', 'email']]);

        try {
            $response = $newsletter->subscribe(request('email'));

        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to out newsletter list.'
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up with our newsletter!');
    }
}
