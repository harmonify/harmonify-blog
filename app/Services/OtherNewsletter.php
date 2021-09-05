<?php 

namespace App\Services;
    
class NewsletterService implements NewsletterInterface
{
    public function subscribe(string $email, string $list = null)
    {
        // subscribe the user with this specific newsletter API.
    }
}