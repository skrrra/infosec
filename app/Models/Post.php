<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    protected $casts = ['created_at' => 'datetime:M d, Y'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
