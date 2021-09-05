<?php 

namespace App\Services;

interface NewsletterInterface {
    public function subscribe(string $email, string $list = null);
}