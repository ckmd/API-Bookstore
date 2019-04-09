<?php

namespace App;

use App\Author;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = ['name'];
    
    public function author(){
        return $this->hasMany("App\Author");
    }
}
