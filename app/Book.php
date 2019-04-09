<?php

namespace App;

use App\Author;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','image'];

    public function author(){
        return $this->belongsTo('App\Author');
    }
}
