<?php

use App\Models\Idea;
use App\Models\User;

it('shows the initial input state', function () {
    $user = User::factory()->create();

    $idea = Idea::factory()->for($user)->create();

    $this->actingAs($user)
        ->get(route('idea.show', $idea))
        ->assertSee($idea->title)
        ->assertSee($idea->description);
});

it('updates an existing idea', function () {
    $user = User::factory()->create();

    $idea = Idea::factory()->for($user)->create([
        'title' => 'Original Title',
        'status' => 'pending',
        'description' => 'Original description',
        'links' => ['https://laracasts.com'],
    ]);

    $this->actingAs($user)
        ->patch(route('idea.update', $idea), [
            'title' => 'Updated Title',
            'status' => 'completed',
            'description' => 'Updated description',
            'links' => ['https://laravel.com'],
            'steps' => [
                ['description' => 'An example step'],
                ['description' => 'Another example step'],
            ],
        ])
        ->assertRedirect(route('idea.show', $idea));

    $idea->refresh();

    expect($idea)->toMatchArray([
        'title' => 'Updated Title',
        'status' => 'completed',
        'description' => 'Updated description',
        'links' => ['https://laravel.com'],
    ]);

    expect($idea->steps)->toHaveCount(2);
});

it('disallows updating an idea you did not create', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $idea = Idea::factory()->create();

    $this->patch(route('idea.update', $idea), [
        'title' => 'Hacked Title',
        'status' => 'completed',
    ])->assertForbidden();
});