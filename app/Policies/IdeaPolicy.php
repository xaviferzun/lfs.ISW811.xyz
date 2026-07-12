<?php
declare(strict_types=1);

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    public function workWith(User $user, Idea $idea): bool
    {
        return $idea->user ->is($user);
    }
}
