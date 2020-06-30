<?php

namespace Jagalan\AmazonAdvertisingApi;

use AmazonAdvertisingApi\Client;
use Jagalan\AmazonAdvertisingApi\ClientV2;

class AmazonAdvertisingApi
{
    public function getClient($region = 'na')
    {
        $config = array(
            "clientId" => config("amazon-advertising-api.$region.clientId"),
            "clientSecret" => config("amazon-advertising-api.$region.clientSecret"),
            "refreshToken" => config("amazon-advertising-api.$region.refreshToken"),
            "region" => config("amazon-advertising-api.$region.region"),
            "sandbox" => config("amazon-advertising-api.$region.sandbox"),
        );

        return new Client($config);
    }

    public function getClientV2($region = 'na')
    {
        $config = array(
            "clientId" => config("amazon-advertising-api.$region.clientId"),
            "clientSecret" => config("amazon-advertising-api.$region.clientSecret"),
            "refreshToken" => config("amazon-advertising-api.$region.refreshToken"),
            "region" => config("amazon-advertising-api.$region.region"),
            "sandbox" => config("amazon-advertising-api.$region.sandbox"),
        );

        return new ClientV2($config);
    }
}
