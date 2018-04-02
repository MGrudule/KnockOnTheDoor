<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Category;
use App\Circle;
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
        'circle_id', 'name', 'email', 'password', 'summary'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token', 'is_administrator'
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

    public function categories()
    {
        return $this->belongsToMany(Category::class,
            'user_categories');
    }

    public function resources()
    {
        return $this->belongsToMany(Resource::class,
            'user_resources'
        )->withPivot('category_id');
    }

    public function resourceCategories()
    {
        return $this->belongsToMany(UserResourceCategory::class,
            'user_resources', 'user_id', 'category_id'
        )->withPivot('resource_id');
    }

    public function resourcesGroupedByCategory()
    {
        return UserResourceCategory::select('id', 'title')
            ->get()
            ->map(function ($category, $key) {
                $category->names = $category
                    ->resourcesForUser($this)
                    ->orderby('title')
                    ->pluck('title')
                    ->all();
                return $category;
            })
            ->all();
    }
}
