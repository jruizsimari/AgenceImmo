<?php

namespace App;

class Weather
{
    public function __construct(public string $apiKey)
    {
    }

    public function isSunnyTomorrow()
    {
        // juste pour l'exemple, mais en realité il irait cherché l'info dans à partir d'une api
        return true;
    }
}
