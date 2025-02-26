<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationMessage extends Model
{
    use HasFactory;

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'application_id');
    }

    public function images()
    {
        return $this->hasMany(MessageImage::class, 'message_id', 'message_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($message) { // before delete() method call this
             $message->images()->delete();
        });
    }
}
