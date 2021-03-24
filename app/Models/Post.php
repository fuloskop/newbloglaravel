<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];


    // $post->user => User Model
    public function User()
    {// 'App\Models\User'
        return $this->belongsTo(User::class);
    }
}
