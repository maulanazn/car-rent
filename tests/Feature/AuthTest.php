<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    function testCheckName() {
        $name = User::where('name', 'maulanazn')->count();

        self::assertEquals(1, $name);
    }
}
