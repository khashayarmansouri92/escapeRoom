<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function refreshDatabase()
    {
        $this->artisan('migrate:fresh', ['--drop-views' => true]);
        $this->artisan('passport:install');
    }

    /**
     * User registration test.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $payload = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'birthday' => $this->faker->date(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];

        $response = $this->postJson('/api/register', $payload);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    /**
     * User login test.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $user = User::factory()->create([
            'email' => 'kh.mansouri92@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $loginData = [
            'email' => 'kh.mansouri92@gmail.com',
            'password' => '123123123',
        ];

        $response = $this->postJson('/api/login', $loginData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'token'
            ]);
    }
}
