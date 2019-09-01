<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'author_id',
        'title'
    ];

    public function authors()
    {
        return $this->belongsTo('App\Author', 'author_id', 'author_id');
    }
}
