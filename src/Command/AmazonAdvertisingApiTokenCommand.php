<?php
namespace Jagalan\AmazonAdvertisingApi\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Luchianenco\OAuth2\Client\Provider\Amazon as AmazonOauth;

class AmazonAdvertisingApiTokenCommand extends Command {

    /**
     * Console command signature
     *
     * @var string
     */
    protected $signature = 'amazonadvertisingapi:token:generate';

    /**
     * Description
     *
     * @var string
     */
    protected $description = 'Gets oAuth tokens from Login With Amazon';

    /**
     * Generate refresh token
     *
     */
    public function handle()
    {
        $config = Config::get('amazon-advertising-api');

        $provider = new AmazonOauth([
            'clientId'          => $config['app']['CLIENT_ID'],
            'clientSecret'      => $config['app']['CLIENT_SECRET'],
            'redirectUri'       => $config['app']['RETURN_URL'],
        ]);

        $authorizationUrl = $provider->getAuthorizationUrl();
        $this->line(sprintf(
            "Log into the Login with Amazon account and open the following URL:\n%s",
            $authorizationUrl
        ));
        $authCode = $this->ask('After approving the token enter the authorization code in the URL here:');
        // Try to get an access token
        $token = $provider->getAccessToken('authorization_code', ['code' => $authCode]);

        $this->line(sprintf('Copy this refresh token in the configuration file (config/amazon-advertising-api.php): "%s"', $token->getRefreshToken()));
    }

}
