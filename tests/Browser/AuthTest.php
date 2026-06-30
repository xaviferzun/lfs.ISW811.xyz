<?php

use App\Models\User;

it('registers a user', function () {
    visit('/register')
        ->fill('name', 'Jane Doe')
        ->fill('email', 'jane@example.com')
        ->fill('password', 'password123!@')
        ->press('Register');

    expect(User::where('email', 'jane@example.com')->exists())->toBe(true);
    $this->assertAuthenticated();
});