<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResource extends Model
{
    protected $fillable = ['user_id', 'resource_id', 'category_id'];
}
