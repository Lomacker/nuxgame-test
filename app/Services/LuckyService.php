<?php

namespace App\Services;

use App\Models\AccessLink;
use App\Models\LuckyResult;
use App\Enums\LuckyResultType;

use App\Services\WinCalculations\WinCalculationResolver;

class LuckyService
{
    public function __construct(
        private readonly WinCalculationResolver $winCalculationResolver
    ) {}

    public function play(AccessLink $link): LuckyResult
    {
        $number = random_int(1, 1000);
        $isWin = $number % 2 === 0;

        $winAmount = 0;

        if ($isWin) {
            $strategy = $this->winCalculationResolver->resolve($number);
            $winAmount = $strategy->calculate($number);
        }

        return LuckyResult::create([
            'access_link_id' => $link->id,
            'random_number' => $number,
            'result' => $isWin ? LuckyResultType::WIN : LuckyResultType::LOSE,
            'win_amount' => $winAmount,
        ]);
    }
}
