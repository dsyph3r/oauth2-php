<?php

namespace OAuth\Client;

interface ClientInterface
{
    public function getAuthorizeUrl();

    public function getAccessTokenUrl();

    public function addToken($identifier, $value);

    public function getToken($identifier);
}
