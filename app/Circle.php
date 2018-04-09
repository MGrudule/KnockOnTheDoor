<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Circle extends Model
{
    protected $fillable = ['title', 'description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function storeImage($file)
    {
        $path = $file->store('public/circles');
        $this->image = $path;
        $this->save();
        return back();
    }

    public function imagePublicUrl()
    {
        return $this->image ? Storage::url($this->image) :
            config('app.default_circle_image');
    }
}
