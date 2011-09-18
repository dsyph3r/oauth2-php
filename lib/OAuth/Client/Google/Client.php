<?php

namespace OAuth\Client\Google;

class Client extends \OAuth\Client\Client
{
    public function getAuthorizeUrl()
    {
        $params = array(
            'client_id'         => $this->tokens['client_id'],
            'response_type'     => 'code',
            'scope'             => 'https://www.googleapis.com/auth/plus.me ',
            'redirect_uri'      => $this->tokens['redirect_uri']
        );
        
        return 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);
    }

    public function getAccessTokenUrl()
    {
        return 'https://accounts.google.com/o/oauth2/token';
    }

    public function getAccessTokenParams()
    {
        return array(
            'code'              => $this->tokens['code'],
            'client_id'         => $this->tokens['client_id'],
            'client_secret'     => $this->tokens['client_secret'],
            'grant_type'        => 'authorization_code',
            'redirect_uri'      => $this->tokens['redirect_uri']
        );
    }

    public function parseAuthorizeResponse($response)
    {
        $content = json_decode($response, true);
        
        return $content;
    }
}
