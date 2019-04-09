<?php

namespace App;

use App\Book;
use App\Contact;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable = ['country_id','name','age','avatar'];
    
    public function books(){
        return $this->hasMany('App\Book');
    } 
    
    public function contact(){
        return $this->hasOne('App\Contact');
    }

    public function country(){
        return $this->belongsTo('App\Country');
    }
}
