<?php

namespace Tests\Unit;

use App\Weather;
use Illuminate\Support\Facades\Cache;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    // C’est utilisé pour éviter la contamination entre tests due à la réutilisation de l’instance de Cache par la facade.
    protected function tearDown(): void
    {
        parent::tearDown();
        Cache::clearResolvedInstances();
    }

    /**
     * A basic unit test example.
     */
    public function test_isSunnyTomorrow_function_returns_false(): void
    {
        // Les facades ne sont pas reconnus dans les tests unitaires
        // Solution : mocker les façades à la volée
        Cache::shouldReceive('get')
            ->with('weather')
            ->once()
            ->andReturn(false);

        $weather = new Weather();
        $this->assertFalse($weather->isSunnyTomorrow());
    }

    public function test_isSunnyTomorrow_function_returns_true(): void
    {
        // Les facades ne sont pas reconnus dans les tests unitaires
        // Solution : mocker les façades à la volée
        Cache::shouldReceive('get')
            ->with('weather')
            ->once()
            ->andReturn(null);

        $weather = new Weather();
        $this->assertTrue($weather->isSunnyTomorrow());
    }
}
