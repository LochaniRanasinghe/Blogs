<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "user_id",
    ];
    //Creating the relationship between the user and the post
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}