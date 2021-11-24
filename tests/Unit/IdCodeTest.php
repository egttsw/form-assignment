<?php

namespace Tests\Unit;

use App\Rules\IdCodeCheck;
use Tests\TestCase;


class IdCodeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $rule;

    // Testing correct ID code
    public function test_id_code_pass()
    {
        $id_code = [4,9,4,0,2,2,1,5,3,2,2];
        $this->rule = new IdCodeCheck();

        $this->assertTrue($this->rule->passes('attribute', $id_code));
    }

    // Testing false ID code. Fail reason: leap year
    public function test_id_code_fail()
    {
        $id_code = [4,9,5,0,2,2,9,5,3,2,2];
        $this->rule = new IdCodeCheck();

        $this->assertFalse($this->rule->passes('attribute', $id_code));
    }
}
