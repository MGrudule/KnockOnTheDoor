<?php

namespace App;

use App\Category;
use App\Comment;
use App\Subject;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'subject_id', 'body'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'message_categories');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function syncTags($tags)
    {
        $this->tags()->sync(
            array_map(function ($tag) {
                return Tag::firstOrCreate(['tag' => $tag])->id;
            }, $tags)
        );
    }
}
