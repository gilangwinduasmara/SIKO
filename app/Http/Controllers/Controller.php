<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Konselor;
use App\Konseli;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $user;

    function assignUser(){
//        dd(session()->all());
        if(session()->has('userId')){
            $userId = session()->get('userId');
            $this->user = User::find($userId);
            session(['token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8yMDYuMTg5Ljk0LjE4Mzo4MDAwXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNjA5ODI2ODM1LCJleHAiOjE2MDk4MzA0MzUsIm5iZiI6MTYwOTgyNjgzNSwianRpIjoiYTA3bzBsWTcySzdMSnhpYyIsInN1YiI6MywicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSIsInVzZXIiOnsiaWQiOjMsIm5hbWUiOiJQZHQuIE9uZXNpbXVzIERhbmkiLCJlbWFpbCI6Im9uZXMuZGFuaUB1a3N3LmVkdSIsImVtYWlsX3ZlcmlmaWVkX2F0IjpudWxsLCJyb2xlIjoia29uc2Vsb3IiLCJjcmVhdGVkX2F0IjoiMjAyMC0wOS0yNFQxOToxMToxNC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjAtMDktMjRUMTk6MTE6MTQuMDAwMDAwWiIsImF2YXRhciI6InJkNnRHalYyeXQucG5nIiwiaW5mbyI6eyJpZCI6MiwibmFtYV9rb25zZWxvciI6IlBkdC4gT25lc2ltdXMgRGFuaSIsInByb2Zlc2lfa29uc2Vsb3IiOiJQZHQgVW5pdmVyc2l0YXMgS3Jpc3RlbiBTYXR5YSBXYWNhbmEiLCJlbWFpbF9rb25zZWxvciI6Im9uZXMuZGFuaUB1a3N3LmVkdSIsIm5vX2hwX2tvbnNlbG9yIjoiMDgxIiwic3RhdHVzIjoiYWt0aWYiLCJ1c2VyX2lkIjozLCJjcmVhdGVkX2F0IjoiMjAyMC0wOS0yNFQxOToxMToxNC4wMDAwMDBaIiwidXBkYXRlZF9hdCI6IjIwMjAtMDktMjRUMTk6MTQ6MzAuMDAwMDAwWiJ9fX0.aTNMHdlQhPjdMUt7CAof96fBcRcYRS-G5W-ogvnV5aY']);

            if($this->user->role == 'konselor'){
                $this->user['details'] = Konselor::where('user_id', $this->user->id)->get()->first();
            }else{
                $this->user['details'] = Konseli::where('user_id', $this->user->id)->get()->first();
            }
        }
    }

    function __construct()
    {
    }


}
