<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; // usar datos para testing

    public function testUser()
    {
        User::factory()->create([
            'email' => 'admin@admin.com'
        ]);

        //dado existe
        $this->assertDatabaseHas('users',[
            'email' => 'admin@admin.com'
        ]);

        //dato no existe
        $this->assertDatabaseMissing('users',[
            'email' => 'test@admin.com'
        ]);
    }
}
