<?php

namespace Jagalan\AmazonAdvertisingApi;

use AmazonAdvertisingApi\Client;

class AmazonAdvertisingApi
{
    public function getClient()
    {
        $config = array(
            "clientId" => config('amazon-advertising-api.app.clientId'),
            "clientSecret" => config('amazon-advertising-api.app.clientSecret'),
            "refreshToken" => config('amazon-advertising-api.app.refreshToken'),
            "region" => config('amazon-advertising-api.app.region'),
            "sandbox" => config('amazon-advertising-api.app.sandbox'),
        );

        return new Client($config);
    }
}
