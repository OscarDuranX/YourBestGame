<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ApiTest
 */
class ApiTest extends TestCase
{
    use DatabaseMigrations;

//    public function testExample()
//    {
//        $this->assertTrue(true);
//    }

    public function createUser()
    {
        $user = factory(App\User::class)->create();
        return $user;
    }

    /**
     * @group failing
     */

    /**
     * Test tasks is an api then returns JSON
     *
     * @return void
     */
    public function testViewJocsAll()
    {
        $this->get('http://localhost:8000/joc')->seeJson();
    }

    /**
     * Test tasks is an api then returns JSON
     *
     * @return void
     */
    public function testViewJocsUser()
    {
        $user = $this->createUser();

        //dd($user);
        $this->get('/user/joc?api_token=' . $user->api_token)->seeJson();


    }
}
