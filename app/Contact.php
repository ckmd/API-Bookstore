<?php

namespace App;

use App\Author;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // protected $fillable = [''];

    public function author(){
        return $this->belongsTo('App\Author');
    }

}
