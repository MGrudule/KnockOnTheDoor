<?php

namespace App;

use App\User;
use App\UserResourceCategory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['type_id', 'title', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class,
            'user_resources'
        )->withPivot('category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(UserResourceCategory::class,
            'user_resources', 'resource_id', 'category_id'
        )->withPivot('user_id');
    }
}
