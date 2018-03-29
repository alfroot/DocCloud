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

    /*
     * Relacion reflexiva
     * public function category()
    {
        return $this->belongsTo(Category::class);
    }*/
}
