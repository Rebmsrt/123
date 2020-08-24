<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'body', 'user_id', 'messages_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function Message()
    {
        return $this->belongsTo(Message::class);
    }

}
