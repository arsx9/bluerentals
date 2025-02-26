<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    //Table name
    protected $table='messages';
    //primary key
    public $primaryKey='id';
    //timestamps
    public $timestamps=true;

    protected $guarded = [];
}
