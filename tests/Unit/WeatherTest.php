<?php

namespace Tests\Unit;

use App\Weather;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Cache;
use Mockery;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_isSunnyTomorrow_function_returns_false(): void
    {
        $mock = Mockery::mock(Repository::class);
        $mock->shouldReceive('get')
            ->with('weather')
            ->once()
            ->andReturn(false);

        $weather = new Weather($mock);
        $this->assertFalse($weather->isSunnyTomorrow());
    }

    public function test_isSunnyTomorrow_function_returns_true(): void
    {
        $mock = Mockery::mock(Repository::class);
        $mock->shouldReceive('get')
            ->with('weather')
            ->once()
            ->andReturn(null);

        $weather = new Weather($mock);
        $this->assertTrue($weather->isSunnyTomorrow());
    }
}
