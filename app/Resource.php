<?php

namespace App;

use App\User;
use App\UserResourceCategory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function user_resources()
    {
        return $this->belongsToMany(User::class, 'user_resources')->
            withPivot('category_id');
    }

    public function user_resource_categories()
    {
        return $this->belongsToMany(
            UserResourceCategory::class, 'user_resources', 'resource_id', 'category_id')->
            withPivot('user_id');
    }

}
