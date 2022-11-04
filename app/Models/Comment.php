<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_id',
    ];

    protected $casts = [
        'body' => 'array',
    ];

    public function posts()
    {
        $this->belongsTo(Post::class, 'post_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_posts', 'user_id', 'post_id');
    }
}
