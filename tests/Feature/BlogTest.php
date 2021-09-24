<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_posts()
    {
        return $this->get('/posts')->assertStatus(200);
    }

    public function test_categories()
    {
        return $this->get('/categories')->assertStatus(200);
    }
    
    public function test_authors()
    {
        return $this->get('/authors')->assertStatus(200);
    }
}
