<?php

namespace App;

use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;

class Weather
{
    public function __construct(private Repository $cache)
    {

    }

    public function isSunnyTomorrow()
    {
        $result = $this->cache->get('weather');
        if ($result !== null) {
            return $result;
        }
        // ... sinon contacter l'api pour recuperer la valeur.
        return true;
    }
}
