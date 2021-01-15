<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatConference extends Model
{
    protected $fillable = ['UserID', 'chat_konseling', 'tgl_chat', 'case_conference_id'];
    public function caseConference(){
        return $this->belongsTo('App\CaseConference');
    }
}
