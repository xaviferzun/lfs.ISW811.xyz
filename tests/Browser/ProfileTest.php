<?php

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailChanged;

it('requires authentication', function () {
    $this->get(route('profile.edit'))->assertRedirect('/login');
});

it('edits a profile', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    visit(route('profile.edit'))
        ->assertValue('name', $user->name)
        ->fill('name', 'New Name')
        ->assertValue('email', $user->email)
        ->fill('email', 'new@example.com')
        ->click('Update Account')
        ->assertSee('Profile updated!');

    expect($user->fresh())->toMatchArray([
        'name' => 'New Name',
        'email' => 'new@example.com',
    ]);
});

it('notifies the original email if updated', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    Notification::fake();

    $originalEmail = $user->email;

    visit(route('profile.edit'))
        ->assertValue('name', $user->name)
        ->fill('email', 'new@example.com')
        ->click('Update Account')
        ->assertSee('Profile updated!');

    Notification::assertSentOnDemand(EmailChanged::class, function (EmailChanged $notification, $routes, $notifiable) use ($originalEmail) {
        return $notifiable->routes['mail'] === $originalEmail;
    });
});