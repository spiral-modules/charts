<?php

namespace Spiral\Charts\Google;

use Spiral\Core\InjectableConfig;

class Config extends InjectableConfig
{
    /**
     * Configuration section.
     */
    const CONFIG = 'modules/charts';

    /**
     * @var array
     */
    protected $config = [
        'scopes' => []
    ];

    /**
     * Where settings file is.
     *
     * @return string
     */
    public function address(): string
    {
        return env('GOOGLE_SERVICE_ACCOUNT_FILE');
    }

    /**
     * Required scopes.
     *
     * @return array
     */
    public function scopes(): array
    {
        return $this->config['scopes'];
    }
}