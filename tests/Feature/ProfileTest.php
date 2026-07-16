<?php

use App\Models\User;
use App\Notifications\EmailChanged;
use Illuminate\Support\Facades\Notification;

it('requires authentication', function () {
    $this->get(route('profile.edit'))->assertRedirect('/login');
});

it('edits a profile', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->patch('/profile', [
            'name' => 'New Name',
            'email' => 'new@example.com',
        ])
        ->assertRedirect(route('profile.edit'));

    expect($user->fresh())->toMatchArray([
        'name' => 'New Name',
        'email' => 'new@example.com',
    ]);
});

it('notifies the original email if updated', function () {
    Notification::fake();

    $user = User::factory()->create();
    $originalEmail = $user->email;

    $this->actingAs($user)
        ->patch('/profile', [
            'name' => $user->name,
            'email' => 'new@example.com',
        ]);

    Notification::assertSentOnDemand(EmailChanged::class, function (EmailChanged $notification, $channels, $notifiable) use ($originalEmail) {
        return $notifiable->routes['mail'] === $originalEmail;
    });
});