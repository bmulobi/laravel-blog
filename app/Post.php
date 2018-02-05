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

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', $month);
        }

        if (isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw("extract('year' from created_at) as year, extract('month' from created_at) as month, count(*) as published")
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
