<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function user_can_generate_gravatar_default_image_when_no_email_found()
    {
        $user = User::factory()->create([
            'name' => 'Maalawi',
            'email' => 'maalawi@gmail.com'
        ]);

        $gravatarUrl = $user->getAvatar();
        dd($gravatarUrl);
    }
}
