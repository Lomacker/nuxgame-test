<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AccessLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:30'],
        ]);

        $user = User::create($validated);

        $link = AccessLink::create([
            'user_id' => $user->id,
            'token' => Str::random(64),
            'expires_at' => now()->addDays(7),
        ]);

        return redirect('/a/' . $link->token);
    }
}
