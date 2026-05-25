<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\LuckyResultType;

class LuckyResult extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'result' => LuckyResultType::class,
        ];
    }

    protected $fillable = [
        'access_link_id',
        'random_number',
        'result',
        'win_amount',
    ];

    public static function latestForLink(AccessLink $link, int $limit = 3)
    {
        return self::where('access_link_id', $link->id)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function accessLink()
    {
        return $this->belongsTo(AccessLink::class);
    }
}
