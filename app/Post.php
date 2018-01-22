<?php

namespace App;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() // can do $this->user->name
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
//        Comment::create([
//            'body' => $body,
//            "post_id" => $this->id
//        ]);

        // Note: $this->comments returns a collection of comments
        $this->comments()->create(compact('body'));
    }
}
