<?php

namespace App\Http\Controllers;

use App\CaseConference;
use Illuminate\Http\Request;
use App\Konseling;
use App\Prodi;
use App\Faculty;
use App\Konseli;
use App\JadwalKonselor;
use App\Notification;
use App\Konselor;
use App\RekamKonseling;
use App\Setting;
use App\User;
use Illuminate\Support\Carbon;
use Validator;

class AdminController extends Controller
{
    public function index(){
        $this->assignUser();
        if(session()->has('userId')){
            return redirect('/dashboard');
        }else{
            return redirect('/admin/login');
        }
    }
    public function login(){
        $this->assignUser();
        return view('pages.admin.login');
    }
    public function dashboard(){
        $this->assignUser();
        return view('pages.admin.dashboard');
    }











// services
    public function doLogin(){

    }


}
