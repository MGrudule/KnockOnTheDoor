<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Category;
use App\Circle;
use App\Profile;
use App\Resource;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'summary'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_administrator'
    ];

    /**
     * Used with auth:api
     */
    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'user_resources')->
            withPivot('category_id');
    }

    public function resources1()
    {
        return $this->belongsToMany(Resource::class, 'user_resource1s');
    }

    public function resources2()
    {
        return $this->belongsToMany(Resource::class, 'user_resource2s');
    }

    public function resources3()
    {
        return $this->belongsToMany(Resource::class, 'user_resource3s');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_categories');
    }

    public function resource_categories()
    {
        return $this->belongsToMany(
            UserResourceCategory::class, 'user_resources', 'user_id', 'category_id')->
            withPivot('resource_id');
    }

}
