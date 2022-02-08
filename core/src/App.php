<?php

namespace src;

use Error;

class App
{
    private Settings $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function __get($key)
    {
        if ($key === 'settings') {
            return $this->settings;
        }
        throw new Error('Accessing a non-existent property');
    }

    public function run(): void
    {
        echo 'Working';
    }
}
