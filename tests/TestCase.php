<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    use RefreshDatabase;

    public function logIn(): User
    {
        $user = factory(User::class)->create();

        $this->actingAs($user, 'api');

        return $user;
    }
}
