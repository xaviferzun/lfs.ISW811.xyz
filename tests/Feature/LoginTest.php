<?php

use App\Models\User;

it('logs in a user', function () {
    $user = User::factory()->create(['password' => 'password123!@#']);

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'password123!@#',
    ])->assertRedirect(route('idea.index'));

    $this->assertAuthenticated();
});

it('logs out a user', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/logout');

    $this->assertGuest();
});