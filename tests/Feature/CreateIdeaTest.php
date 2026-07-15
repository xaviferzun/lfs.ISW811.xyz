<?php

use App\Models\User;

//Feature
it('creates a new idea', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/ideas', [
            'title' => 'Some Example Title',
            'status' => 'completed',
            'description' => 'An example description',
            'links' => ['https://laracasts.com', 'https://laravel.com'],
            'steps' => [
                ['description' => 'An example step'],
                ['description' => 'Another example step'],
            ],
        ])
        ->assertRedirect('/ideas');

    $idea = $user->ideas()->first();

    expect($idea)->toMatchArray([
        'title' => 'Some Example Title',
        'status' => 'completed',
        'description' => 'An example description',
        'links' => ['https://laracasts.com', 'https://laravel.com'],
    ]);

    expect($idea->steps)->toHaveCount(2);
});