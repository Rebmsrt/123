<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'name', 'date', 'manager',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function themes() {
        return $this->hasMany(Theme::class);
    }
}
