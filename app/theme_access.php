<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theme_access extends Model
{
    protected $fillable = [
         'user_id', 'theme_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
