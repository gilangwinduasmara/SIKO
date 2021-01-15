<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatKonseling extends Model
{
    protected $fillable = ['userID', 'chat_konseling', 'tgl_chat', 'konseling_id'];
    public function konseling(){
        return $this->belongsTo('App\Konseling');
    }
}
