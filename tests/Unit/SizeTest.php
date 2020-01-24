<?php

namespace Tests\Unit;

use App\Good;
use App\Http\Resources\GoodCollection;
use App\Http\Resources\SizeCollection;
use App\Size;
use Tests\TestCase;

class SizeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_size_collection()
    {
        $collection = (new SizeCollection(Size::all()))->toArray([]);
        $this->assertTrue(true);
        $this->assertArrayHasKey('name', $collection[0]);
    }
}
