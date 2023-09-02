<?php

namespace Tests\Unit;

use App\Livewire\User\Signup;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SignupTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_registers_a_user()
    {

        Livewire::test(Signup::class)
            ->assertStatus(200);

        // Define test data
        $data = [
            'email' => $this->faker->unique()->safeEmail,
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // Simulate Livewire component interaction
        Livewire::test(Signup::class)
            ->set('email', $data['email'])
            ->set('fname', $data['fname'])
            ->set('lname', $data['lname'])
            ->set('password', $data['password'])
            ->set('password_confirmation', $data['password_confirmation'])
            ->call('registerStore');

        // Assert that a user with the given email exists in the database
        $this->assertDatabaseHas('users', ['email' => $data['email']]);

        // Define test data
        $array = [
            [
                'email' => '',
                'fname' => $this->faker->firstName,
                'lname' => $this->faker->lastName,
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'error' => 'email'
            ],
            [
                'email' => $this->faker->unique()->safeEmail,
                'fname' => '',
                'lname' => $this->faker->lastName,
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'error' => 'fname'
            ],
            [
                'email' => $this->faker->unique()->safeEmail,
                'fname' => $this->faker->firstName,
                'lname' => '',
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'error' => 'lname'
            ],
            [
                'email' => $this->faker->unique()->safeEmail,
                'fname' => $this->faker->firstName,
                'lname' => $this->faker->lastName,
                'password' => 'password123',
                'password_confirmation' => 'password',
                'error' => 'password'
            ]
        ];

        foreach ($array as $data) {
            // Simulate Livewire component interaction
            Livewire::test(Signup::class)
                ->set('email', $data['email'])
                ->set('fname', $data['fname'])
                ->set('lname', $data['lname'])
                ->set('password', $data['password'])
                ->set('password_confirmation', $data['password_confirmation'])
                ->call('registerStore')
                ->assertHasErrors($data['error']);
        }

    }
}
