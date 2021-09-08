<?php

namespace App\Http\Controllers;

use App\Services\NewsletterInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Request $request, NewsletterInterface $newsletter)
    {
        $email = $request->validate(['email' => 'required|email:dns'])['email'];

        try {
            $newsletter->subscribe($email);
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.',
            ]);
        }

        return redirect('/')->with('alert', [
            'type' => 'success',
            'message' => 'Your email is added to our newsletter list.'
        ]);
    }
}
