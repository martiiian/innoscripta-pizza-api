<?php

namespace Tests\Unit;

use App\Good;
use App\Http\Resources\GoodCollection;
use Tests\TestCase;

class GoodTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_good_collection()
    {
        $collection = (new GoodCollection(Good::all()))->toArray([]);
        $this->assertTrue(true);
        $this->assertArrayHasKey('name', $collection[0]);
    }
}
