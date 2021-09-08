<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile; //probar img ficticia
use Illuminate\Support\Facades\Storage; //almacenamiento

class ProfileTest extends TestCase 
{
    public function testUpload() 
    {
        Storage::fake('local');

        $response = $this->post('profile', [
            'photo' => $photo = UploadedFile::fake()->image('photo.png')
        ]);

        Storage::disk('local')->assertExists("profiles/{$photo->hashName()}");

        //$this->assertTrue(Storage::disk('local')->exists($imageRoute));

        $response->assertRedirect('profile');
    }

    public function test_photo_required() 
    {
        $response = $this->post('profile', ['photo' => '']);
        
        $response->assertSessionHasErrors(['photo']);
    }
}