<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\AccessLinkService;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(
        RegisterRequest $request,
        AccessLinkService $accessLinkService
    ) {
        $user = User::create($request->validated());

        $link = $accessLinkService->createForUser($user);

        return redirect()->route('access.show', [
            'token' => $link->token,
        ]);
    }
}
