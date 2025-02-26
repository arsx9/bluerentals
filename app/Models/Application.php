<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(ApplicationMessage::class, 'application_id', 'application_id')->orderBy('id','desc');
    }

    public function kids()
    {
        return $this->hasMany(ApplicationKid::class, 'application_id', 'application_id');
    }

    public function images()
    {
        return $this->hasMany(ApplicationImage::class, 'application_id', 'application_id');
    }

    public function attachments()
    {
        return $this->hasManyThrough(
            MessageImage::class, 
            ApplicationMessage::class, 
            'application_id', 
            'message_id',
            'application_id',
            'message_id'
        );
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($application) { // before delete() method call this
             $application->messages()->delete();
             $application->kids()->delete();
             $application->attachments()->delete();
        });
    }
}
