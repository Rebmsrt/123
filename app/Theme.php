<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Theme extends Model
{
    use Notifiable;

    protected $fillable = [
        'name','status','events_id','owner_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function event()
    {
        return $this->belongsTo(Events::class);
    }
    public function theme_accesses() {
        return $this->hasMany(theme_access::class);
    }
}
