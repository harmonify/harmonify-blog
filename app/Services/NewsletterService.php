<?php 

namespace App\Services;

use \MailchimpMarketing\ApiClient;
    
class NewsletterService
{
    protected function client()
    {
        $client = new ApiClient();

        return $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server'),
        ]);
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config("services.mailchimp.lists.subscriber");

        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    public function getAllSubscribers()
    {
        return $this->client()->lists->getListMembersInfo(config("services.mailchimp.lists.subscriber"))->members;
    }
    
    public function getAllSubscribersEmail()
    {
        return collect($this->getAllSubscribers())->pluck('email_address')->toArray();
    }
}

?>