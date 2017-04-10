<?php

namespace Spiral\Charts\Google;

class AccessToken
{
    /** @var string */
    protected $error;

    /** @var array */
    protected $token;

    /**
     * AccessToken constructor.
     *
     * @param array $token
     */
    public function __construct(array $token = [])
    {
        $this->token = $token;
    }

    /**
     * @param string $error
     * @return self
     */
    public function withError(string $error): self
    {
        $token = clone $this;
        $token->error = $error;

        return $token;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return empty($this->error);
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        $created = new \DateTimeImmutable($this->token['created']);
        $interval = new \DateInterval(sprintf('P%ss', $this->token['expires_in']));

        return $created->add($interval) <= new \DateTime();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->isValid()) {
            return $this->token['access_token'];
        }

        return $this->error;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->token;
    }
}