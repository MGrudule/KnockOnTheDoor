<?php

namespace App;

use App\Category;
use App\Comment;
use App\Subject;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'message_categories');
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'message_comments');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'message_tags');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
