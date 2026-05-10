<?php

namespace App\Services;

use Google\Client;
use Google\Service\ShoppingContent;

class GoogleMerchantService
{
    public $service;

    public function __construct()
    {
        $client = new Client();

        $client->setAuthConfig(
            storage_path('app/google/merchant.json')
        );

        $client->addScope(
            ShoppingContent::CONTENT
        );

        $this->service = new ShoppingContent($client);
    }
}
