<?php

namespace App;

use App\Resource;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserResourceCategory extends Model
{
    protected $fillable = ['title'];

    public function resources()
    {
        return $this->belongsToMany(Resource::class,
            'user_resources', 'category_id', 'resource_id'
        )->withPivot('user_id');
    }

    public function resourcesForUser(User $user)
    {
        return $this->resources()->where(['user_id' => $user->id]);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,
            'user_resources', 'category_id', 'user_id'
        )->withPivot('resource_id');
    }
}
