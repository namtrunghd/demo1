<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $user = User::create([
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
        ]);
 
        $this->assertEquals(1,count($user));
    }

    public function testUpdate()
    {
        $user = User::create([
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $result = $user->update([
            'email' => 'user01@gmail.com',
        ]);
        $this->assertEquals(true, $result);
    }

    public function testDetele()
    {
        $user = User::create([
            'email' => 'user01@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $result = $user->delete();
        $this->assertEquals(true, $result);
    }
}
