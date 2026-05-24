<?php

namespace App\Http\Controllers;

use App\Models\AccessLink;
use Illuminate\Support\Str;

class AccessPageController extends Controller
{
    public function show(string $token)
    {
        $link = AccessLink::findValidByToken($token);

        return view('access-page', [
            'link' => $link,
        ]);
    }

    public function regenerate(string $token)
    {
        $link = AccessLink::findValidByToken($token);

        $link->update([
            'is_active' => false,
        ]);

        $newLink = AccessLink::create([
            'user_id' => $link->user_id,
            'token' => Str::random(64),
            'expires_at' => now()->addDays(7),
        ]);

        return redirect()->route('access.show', $newLink->token);
    }

    public function deactivate(string $token)
    {
        $link = AccessLink::findValidByToken($token);

        $link->update([
            'is_active' => false,
        ]);

        return view('link-deactivated');
    }

}
