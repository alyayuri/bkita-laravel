<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Konseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topik',
        'pesan',
        'layanan',
        'status',
    ];

    // 🔹 RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}