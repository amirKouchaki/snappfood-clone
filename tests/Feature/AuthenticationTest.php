<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;


class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    public function test_authenticated_users_can_get_a_their_own_information()
    {
        $this->be(User::factory()->create());
        $this->get('/api/user')->assertOk();

    }

    public function test_guests_cannot_get_users_information(){
        User::factory()->create();
        $this->get('/api/user')->assertUnauthorized();
    }

    public function test_invalid_email_does_not_pass_for_email_verfication_request(){
        $this->post('/api/register',['email' => 'amir'])
        ->assertRedirect();

        $this->post('/api/register',)
            ->assertRedirect();

        $this->post('/api/register',['email' => 12])
            ->assertRedirect();

        $this->post('/api/register',['email' => Str::random(256)])
            ->assertRedirect();
    }

    public function test_signed_guests_can_request_email_verificationCode(){
        $user = User::factory()->create();
        $this->post('/api/register',['email' => $user->email])
        ->assertOk()
        ->assertJson(['success' => true,'userPassExists' => true]);
    }

    public function test_unsigned_guests_can_request_email_verificationCode()
    {
        $email = 'amirkouchaki1@gmail.com';
        $this->post('/api/register', compact('email'))
            ->assertOk()
            ->assertJson(['success' => true, 'userPassExists' => false]);
    }


}
