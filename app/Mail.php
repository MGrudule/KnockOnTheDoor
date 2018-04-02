<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = [
        'body', 'from_address', 'from_name', 'subject', 'attach'];

    public function bodyText()
    {

    }
}
