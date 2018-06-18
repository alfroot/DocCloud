<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use  SoftDeletes;
    protected $fillable =['name', 'description', 'category_parent_id', 'id','user_id'];
    protected $dates = ['deleted_at'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_parent_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($category) {

            //Las categorias hijas y los documentos de esta se iran a la categoria descategorizadas
            $category->documents->each->update([
                'category_id' => '2'
            ]);

            $category->children->each->update([
                'category_parent_id' => '2'
            ]);



        });

    }


}
