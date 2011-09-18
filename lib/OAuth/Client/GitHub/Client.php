<?php

namespace OAuth\Client\GitHub;

class Client extends \OAuth\Client\Client
{
    public function getAuthorizeUrl()
    {
        return 'https://github.com/login/oauth/authorize?client_id=' . $this->tokens['client_id'];
    }

    public function getAccessTokenUrl()
    {
        return 'https://github.com/login/oauth/access_token';
    }

    public function getAccessTokenParams()
    {
        return array(
            'client_id'         => $this->tokens['client_id'],
            'client_secret'     => $this->tokens['client_secret'],
            'code'              => $this->tokens['code']
        );
    }

    public function parseAuthorizeResponse($response)
    {
        $content = array();
        parse_str($response, $content);

        return $content;
    }
}
