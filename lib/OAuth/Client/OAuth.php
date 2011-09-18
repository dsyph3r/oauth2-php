<?php

namespace OAuth\Client;

use OAuth\Client\ClientInterface;
use Buzz\Browser;

class OAuth
{
    protected $client;

    protected $browser;

    public function __construct(ClientInterface $client, Browser $browser = null)
    {
        $this->client   = $client;
        $this->browser  = $browser ?: new Browser();
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getAuthorizeUrl()
    {
        return $this->client->getAuthorizeUrl();
    }

    public function authorize()
    {
        $response = $this->browser->post(
            $this->client->getAccessTokenUrl(),
            array(),
            http_build_query($this->client->getAccessTokenParams())
        );
        
        return $this->client->parseAuthorizeResponse($response->getContent());
    }
}
