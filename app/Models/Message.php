<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'konseling_id',
        'user_id',
        'message',
    ];

    public function konseling()
    {
        return $this->belongsTo(Konseling::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}