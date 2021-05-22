<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Url extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
        'visits_count',
        'short',
        'destination',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
