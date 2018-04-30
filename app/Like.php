<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($like) {

            Storage::disk('public')->delete($documento->storage);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}
