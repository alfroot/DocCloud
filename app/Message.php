<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use DatesTranslator;
    protected $fillable = ['id', 'from', 'to', 'content', 'read', 'extension_id', 'storage', 'premium' ];
    protected $dates = ['created_at', 'updated_at', 'disabled_at','mydate'];
    protected $hidden = ['storage'];

    public function user()
    {
        return $this->belongsTo(User::class,'from','id');
    }

    public function userto()
    {
        return $this->belongsTo(User::class,'to','id');
    }
}
