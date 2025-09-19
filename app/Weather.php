<?php

namespace App;

use Illuminate\Support\Facades\Cache;

class Weather
{
    public function isSunnyTomorrow()
    {
        $result = Cache::get('weather');
        if ($result !== null) {
            return $result;
        }
        // ... sinon contacter l'api pour recuperer la valeur.
        return true;
    }
}
