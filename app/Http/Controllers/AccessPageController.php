<?php

namespace App\Http\Controllers;

use App\Models\AccessLink;
use App\Services\AccessLinkService;

class AccessPageController extends Controller
{
    public function show(string $token)
    {
        //dd($token, AccessLink::where('token', $token)->first());

        $link = AccessLink::findValidByToken($token);

        return view('access-page', [
            'link' => $link,
        ]);
    }

    public function regenerate(string $token, AccessLinkService $accessLinkService)
    {
        $link = AccessLink::findValidByToken($token);

        $newLink = $accessLinkService->regenerate($link);

        return redirect()->route('access.show', $newLink->token);
    }

    public function deactivate(string $token, AccessLinkService $accessLinkService)
    {
        $link = AccessLink::findValidByToken($token);

        $accessLinkService->deactivate($link);

        return view('link-deactivated');
    }
}
