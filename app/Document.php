<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $fillable = ['name', 'description', 'url', 'category_id', 'user_id', 'extension_id', 'storage'];


    public static function boot()
    {
        parent::boot();
        static::deleting(function ($documento) {

            Storage::disk('public')->delete($documento->storage);
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function extension()
    {
        return $this->belongsTo(Extension::class);
    }

}
