<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    // お気に入り追加    
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'post_user', 'user_id', 'post_id')->withTimestamps();
    }
    
    public function like($postId)
    {
        // 既にお気に入りに追加しているかの確認
        $exist = $this->is_like($postId);
        // 相手が自分自身ではないかの確認
        // $its_me = $this->id == $postId;
    
        if ($exist) {
            // 既にお気に入りに追加していれば何もしない
            return false;
        } else {
            // お気に入りに追加していなければ追加する
            $this->likes()->attach($postId);
            return true;
        }
    }
    
    public function unlike($postId)
    {
        // 既にお気に入りに追加しているかの確認
        $exist = $this->is_like($postId);
        // 相手が自分自身ではないかの確認
        // $its_me = $this->id == $postId;
    
        if ($exist) {
            // 既にお気に入りに追加していればお気に入りを外す
            $this->likes()->detach($postId);
            return true;
        } else {
            // お気に入りに追加していなければ何もしない
            return false;
        }
    }
    
    public function is_like($postId)
    {
        return $this->likes()->where('post_id', $postId)->exists();
    }
    
}
