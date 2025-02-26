<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    //Table name
    protected $table='properties';
    //primary key
    public $primaryKey='id';
    //timestamps
    public $timestamps=true;

    protected $guarded = [];

    public function terms(){
        return $this->belongsToMany('App\Models\Term');
    }

    public function features(){
        return $this->belongsToMany('App\Models\Feature');
    }

    public function tags(){
        return $this->hasMany('App\Models\PropertyTag');
    }

    public function images(){
        return $this->hasMany('App\Models\PropertyImage');
    }

    public function hasTerm($term){
        if($this->terms()->where('term', $term)->first()){
            return true;
        }
        return false;
    }

    public function hasFeature($feature){
        if($this->features()->where('feature', $feature)->first()){
            return true;
        }
        return false;
    }

}
