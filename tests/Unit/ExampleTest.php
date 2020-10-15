<?php

namespace Tests\Unit;

use App\Models\SubTitle;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    /** @test */
    public function get_sub_titles() {
        $sub_titles = SubTitle::all();

        $this->assertCount(2, count($sub_titles));
    }
}
