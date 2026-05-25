<?php

namespace App\Http\Controllers;

use App\Models\AccessLink;
use App\Models\LuckyResult;
use App\Services\LuckyService;

class LuckyController extends Controller
{
    public function play(string $token, LuckyService $luckyService)
    {
        $link = AccessLink::findValidByToken($token);

        $result = $luckyService->play($link);

        return view('lucky-result', [
            'link' => $link,
            'result' => $result,
        ]);
    }

    public function history(string $token)
    {
        $link = AccessLink::findValidByToken($token);

        $results = LuckyResult::latestForLink($link);

        return view('history', [
            'link' => $link,
            'results' => $results,
        ]);
    }
}
