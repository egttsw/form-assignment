<?php

namespace Tests\Unit;

use Tests\TestCase;

class HttpTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    // Testing get methods
    public function test_get_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_get_sent()
    {
        $response = $this->get('/sent');

        $response->assertStatus(200);
    }
    // Testing post method
    public function test_post_pass()
    {
        $response = $this->post('/sent', [
            'name'             => 'Eino Muidugi',
            'personal-id-code' =>  '39008225492',
            'loan-amount'      =>  '5000',
            'period'           =>  '9',
            'purpose'          =>  'Tuleb üks suurem investeering'
        ]);

        $response->assertStatus(200);
    }
}
