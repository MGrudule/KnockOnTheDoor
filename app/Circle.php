<?php

namespace App;

use App\Circle;
use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $fillable = ['title', 'description'];
}
