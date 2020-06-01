<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    // protected $table = 'post'; to change default table
    // change primary key

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
