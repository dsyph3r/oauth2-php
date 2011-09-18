<?php

namespace OAuth\Client;

abstract class Client implements ClientInterface
{
    protected $tokens = array();

    public function __construct($tokens)
    {
        $this->tokens = $tokens;
    }

    public function addToken($identifier, $value)
    {
        $this->tokens[$identifier] = $value;
    }

    public function getToken($identifier)
    {
        return (isset($this->tokens[$identifier])) ? $this->tokens[$identifier] : null;
    }
}
