<?php


class Example extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        WP_Mock::setUp();
    }

    public function tearDown()
    {
        WP_Mock::tearDown();
    }

    /** @test */
    public function true()
    {
        $this->assertTrue(true);
    }
}
