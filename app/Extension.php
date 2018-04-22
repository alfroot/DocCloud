<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    public function document()
    {
        return $this->hasMany(Document::class);
    }

}
