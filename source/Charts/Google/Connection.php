<?php

namespace Spiral\Charts\Google;

class Connection
{
    const GOOGLE_TOKEN = 'google-gaembed-token';

    /** @var Config */
    private $config;

    /** @var StorageInterface */
    private $storage;

    /**
     * Connection constructor.
     *
     * @param Config           $config
     * @param StorageInterface $storage
     */
    public function __construct(Config $config, StorageInterface $storage)
    {
        $this->config = $config;
        $this->storage = $storage;
    }

    public function example()
    {
        $token = $this->token();
        if (!$token->isValid()) {
            echo 'error: ' . $token;
        } else {
            echo 'token: ' . $token;
        }
    }

    /**
     * @return AccessToken
     */
    public function token(): AccessToken
    {
        $token = $this->getStoredToken();
        if (!empty($token) && !$token->isExpired()) {
            return $token;
        }

        $token = $this->callToken();
        if ($token->isValid()) {
            $this->storeToken($token);
        }

        return $token;
    }

    /**
     * @return AccessToken
     */
    protected function callToken(): AccessToken
    {
        $client = new \Google_Client();
        $client->setScopes($this->config->scopes());
        $client->setAuthConfig($this->config->address());
        $client->setAccessType('offline');

        try {
            $token = $client->fetchAccessTokenWithAssertion();
        } catch (\Exception $exception) {
            $token = new AccessToken();

            return $token->withError($exception->getMessage());
        }

        return new AccessToken($token);
    }

    /**
     * Get store access token.
     *
     * @return AccessToken|null
     */
    private function getStoredToken()
    {
        $token = $this->storage->retrieve(static::GOOGLE_TOKEN);

        if (empty($token) || !is_array($token)) {
            return null;
        }

        return new AccessToken($token);
    }

    /**
     * Store access token.
     *
     * @param AccessToken $token
     */
    private function storeToken(AccessToken $token)
    {
        $this->storage->store(static::GOOGLE_TOKEN, $token->toArray());
    }
}