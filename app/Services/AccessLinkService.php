<?php

namespace App\Services;

use App\Models\AccessLink;
use App\Models\User;
use Illuminate\Support\Str;

class AccessLinkService
{
    public function createForUser(User $user): AccessLink
    {
        return AccessLink::create([
            'user_id' => $user->id,
            'token' => Str::random(config('access.token_length')),
            'expires_at' => now()->addDays(config('access.ttl_days')),
        ]);
    }

    public function regenerate(AccessLink $link): AccessLink
    {
        $link->deactivate();

        return AccessLink::create([
            'user_id' => $link->user_id,
            'token' => Str::random(config('access.token_length')),
            'expires_at' => now()->addDays(config('access.ttl_days')),
        ]);
    }

    public function deactivate(AccessLink $link): void
    {
        $link->deactivate();
    }
}
