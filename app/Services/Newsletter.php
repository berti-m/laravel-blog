<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter {
	protected function client(){
	    return (new ApiClient())->setConfig([
	        'apiKey' => config('services.mailchimp.key'),
	        'server' => 'us18'
	    ]);
	}
	public function subscribe(string $email, string $list_id = null){
		$list_id ??= config('services.mailchimp.lists.subscribers');

	    return $this->client()->lists->addListMember($list_id, [
        	'email_address' => $email,
        	'status' => 'subscribed'
        ]);
	}
}