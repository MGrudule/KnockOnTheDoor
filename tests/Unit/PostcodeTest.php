<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Postcode
{
    public static function format($postcode)
    {
        $match = preg_match('/^\s*(\d{4})\s*(\w\w)\s*$/', $postcode, $matches);
        if ($match == 0) return false;
        return $matches[1] . strtoupper($matches[2]);
    }

    public static function is_valid($postcode)
    {
        $formated_postcode = Postcode::format($postcode);
        return $formated_postcode !== false;
    }
}

class PostcodeTest extends TestCase
{
    public function test_format_all_postcodes_in_a_uniform_way()
    {
        $this->assertEquals("9876AB", Postcode::format("9876 AB"));
        $this->assertEquals("9876AB", Postcode::format("9876 ab"));
        $this->assertEquals("9876AB", Postcode::format("  9876 ab  "));
        $this->assertEquals("9876AB", Postcode::format(" \t9876\tab\t "));
    }

    public function test_if_a_postcode_is_a_valid_dutch_postcode()
    {
        $this->assertTrue(Postcode::is_valid("9468 BS"));
        $this->assertFalse(Postcode::is_valid("BS 9468"));
    }

}
