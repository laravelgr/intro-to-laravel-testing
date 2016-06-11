<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    public function testRegisterFruit()
    {
        $this->json('POST', '/fruit', ['name' => 'Orange']);
        $this->assertRedirectedTo('/fruit/1');
        $this->assertResponseStatus(201);
    }

    public function testGetFruit()
    {
        $this->json('GET', 'fruit/1');
        $this->seeJson(['id' => 1, 'name' => 'Orange']);
        $this->assertResponseStatus(200);
    }

    private function debugResponse()
    {
        file_put_contents(__DIR__.'/response.html', $this->response->content());
        die;
    }
}
