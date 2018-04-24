<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['name', 'description', 'category_parent_id'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {

            $category->documents->each->delete();
        });
    }
}
