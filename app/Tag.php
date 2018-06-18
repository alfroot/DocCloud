<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

}
