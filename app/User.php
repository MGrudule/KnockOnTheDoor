<?php

namespace App;

use App\Category;
use App\Circle;
use App\Resource;
use App\UserResource;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

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

    public function updateResources($resources)
    {
        foreach ($resources as $category) {
            $resourceIds = array_map(function ($resource) {
                return Resource::firstOrCreate(['title' => $resource])->id;
            }, $category['names']);

            $existingResources = UserResourceCategory::find($category['id'])
                ->resourcesForUser($this)
                ->get()
                ->keyBy('id');
            foreach ($resourceIds as $resourceId) {
                if (isset($existingResources[$resourceId])) {
                    unset($existingResources[$resourceId]);
                } else {
                    UserResource::create([
                        'user_id' => $this->id,
                        'resource_id' => $resourceId,
                        'category_id'=> $category['id'],
                    ]);
                }
            }
            foreach ($existingResources as $resource) {
                UserResource::where([
                    'user_id' => $this->id,
                    'resource_id' => $resource->id,
                    'category_id'=> $category['id'],
                ])->delete();
            }
        }
    }

    public function storeImage($file)
    {
        $path = $file->store('public/users');
        $this->image = $path;
        $this->save();
        return back();
    }

    public function imagePublicUrl()
    {
        return $this->image ? Storage::url($this->image) :
            config('app.default_profile_image');
    }

    public function sendWelcomeMail($registrar) {
        return \Mail::to($this)->send(
            new \App\Mail\Welcome($this, $registrar));
    }
}
