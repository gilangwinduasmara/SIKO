<?php

namespace App\Providers;

use App\Konseling;
use App\Mail\NotifEmail;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            Notification::created(function ($notification){
                $user = User::find($notification->user_id);
                $email = [];
                $email['to'] = $user->email;
                $email['subject'] = $notification->type;
                $email['body'] = $notification->message;
                $subject = "";
                $data = null;
                switch($notification->type){
                    case 'new_konseling':
                        $subject = "Sesi Konseling Baru";
                        $data = Konseling::with('konseli')->with('konselor')->find($notification->data);
                        break;
                    case 'end_konseling':
                        $subject = "Sesi Konseling Berakhir";
                        $data = Konseling::with('konseli')->with('konselor')->find($notification->data);
                        break;
                    case 'ask_referral':
                        $subject = "Permintaan Referal";
                        $data = Konseling::with('konseli')->with('konselor')->find($notification->data);
                        break;
                    case 'agreed_referral':
                        $subject = "Permintaan Referal Disetujui";
                        $data = Konseling::with('konseli')->with('konselor')->find($notification->data);
                        break;
                    case 'declined_referral':
                        $subject = "Permintaan Referal Ditolak";
                        $data = Konseling::with('konseli')->with('konselor')->find($notification->data);
                        break;
                    case 'ask_conference':
                        $subject = "Permintaan Case Conference";
                        $data = Konseling::with('konseli')->with('konselor')->find($notification->data);
                        break;
                    case 'agreed_conference':
                        $subject = "Permintaan Case Conference Disetujui";
                        $data = Konseling::with('konseli')->with('konselor')->find($notification->data);
                        break;
                    case 'declined_conference':
                        $subject = "Permintaan Case Conference Ditolak";
                        break;
                }
                if($notification->type != 'chat' && $notification->type != 'chat_conference'){
                    foreach(['nina.setyawati@uksw.edu', 'gilangwinduasmara2@gmail.com', 'dwihosanna.bangkalang@uksw.edu'] as $to){
                        Mail::to($to)->send(new NotifEmail($notification, $data, $subject));
                    }
                }

            });
    }
}
