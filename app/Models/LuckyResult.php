<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'access_link_id',
        'random_number',
        'result',
        'win_amount',
    ];

    public function accessLink()
    {
        return $this->belongsTo(AccessLink::class);
    }
}
