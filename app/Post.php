<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'picture', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
