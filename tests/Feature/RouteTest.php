<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_root_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_base_web_roites()
    {
        $urls = [
            '/',
            '/about',
            '/contact',
            '/admin'
        ];
        echo PHP_EOL;
        foreach ($urls as $url) {
            $response = $this->get($url);
            if((int)$response->status()!==200){
                echo $url.'(FAILED) did not return 200!';
                $this->assertTrue(false);
            } else {
                echo $url.'(success?)';
                $this->assertTrue(true);
            }
            echo PHP_EOL;
        }
    }
}
