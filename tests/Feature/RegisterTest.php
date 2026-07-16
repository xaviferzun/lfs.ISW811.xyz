<?php

use Illuminate\Support\Facades\Auth;

it('registers a user', function () {
    $this->post('/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123!@#',
    ])->assertRedirect(route('idea.index'));

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});