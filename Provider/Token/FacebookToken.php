<?php

namespace Etcpasswd\OAuthBundle\Provider\Token;

/**
 *
 * @author   Marcel Beerta <marcel@etcpasswd.de>
 */
class FacebookToken implements TokenResponseInterface
{

    private $json;
    private $accessToken;
    private $expiresAt;
    private $friends;

    /**
     * Constructs a new token
     *
     * @param object $jsonObject  Json object
     * @param string $accessToken Api access token
     *
     * @return void
     */
    public function __construct($jsonObject, $accessToken, $expiresAt, $friends)
    {
        $this->json = $jsonObject;
        $this->accessToken = $accessToken;
        $this->expiresAt = $expiresAt;
        $this->friends = $friends;
    }

    /**
     * {@inheritDoc}
     */
    public function getExpires()
    {
        return $this->expiresAt;
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {
        return $this->json->name;
    }

    /**
     * {@inheritDoc}
     */
    public function isLongLived()
    {
        return false;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }
    
    public function getJson()
    {
        
        return $this->json;
        
    }
    
    public function getFriends()
    {
        
        return $this->friends;
        
    }
    
    public function getProviderKey()
    {
        return 'facebook';
    }
    
}