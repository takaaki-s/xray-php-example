<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'author_name'
    ];

    public function books()
    {
        return $this->hasMany('App\Book', 'author_id', 'id');
    }
}
