<?php

namespace Jagalan\AmazonAdvertisingApi;

use AmazonAdvertisingApi\Client;

/**
 * Class AmazonAdvertisingApi
 * @package Jagalan\AmazonAdvertisingApi
 */
class AmazonAdvertisingApi
{
    /**
     * @return Client
     */
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

    /**
     * @param $region
     * @return Client
     */
    public function getClientByRegion($region)
    {
        $config = array(
            "clientId" => config('amazon-advertising-api.' . $region . '.clientId'),
            "clientSecret" => config('amazon-advertising-api.' . $region . '.clientSecret'),
            "refreshToken" => config('amazon-advertising-api.' . $region . '.refreshToken'),
            "region" => config('amazon-advertising-api.' . $region . '.region'),
            "sandbox" => config('amazon-advertising-api.' . $region . '.sandbox'),
        );

        return new Client($config);
    }
}
