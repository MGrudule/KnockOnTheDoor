<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $fillable = ['title', 'description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
