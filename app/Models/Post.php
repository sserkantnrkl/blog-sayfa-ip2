<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Hangi alanların toplu olarak doldurulabileceğini belirtiyoruz
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'publish_date',
    ];

    // Bu blog yazısının hangi kullanıcıya ait olduğunu belirten ilişki
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
