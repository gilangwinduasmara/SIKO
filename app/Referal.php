<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referal extends Model
{
    protected $fillable = ['tgl_referral', 'judul_referral', 'pesan_referral', 'jadwal_konselor_id', 'konseling_id', 'konselor_tujuan_id', 'referral_id'];
    public function konseling(){
        return $this->belongsTo('App\Konseling');
    }



    public function konselor(){
        return $this->belongsTo('App\Konselor', 'konselor_tujuan_id', 'id');
    }
}
