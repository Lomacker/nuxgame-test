<?php

namespace App\Http\Controllers;

use App\Models\AccessLink;
use App\Models\LuckyResult;

class LuckyController extends Controller
{
    public function play(string $token)
    {
        $link = AccessLink::findValidByToken($token);

        $number = random_int(1, 1000);

        $isWin = $number % 2 === 0;

        $winAmount = 0;

        if ($isWin) {
            $winAmount = match (true) {
                $number > 900 => $number * 0.7,
                $number > 600 => $number * 0.5,
                $number > 300 => $number * 0.3,
                default => $number * 0.1,
            };
        }

        $result = LuckyResult::create([
            'access_link_id' => $link->id,
            'random_number' => $number,
            'result' => $isWin ? 'win' : 'lose',
            'win_amount' => $winAmount,
        ]);

        return view('lucky-result', [
            'link' => $link,
            'result' => $result,
        ]);
    }

    public function history(string $token)
    {
        $link = AccessLink::findValidByToken($token);

        $results = $link->luckyResults()
            ->latest()
            ->limit(3)
            ->get();

        return view('history', [
            'link' => $link,
            'results' => $results,
        ]);
    }

}
