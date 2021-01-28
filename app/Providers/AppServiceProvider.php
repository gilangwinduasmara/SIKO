<?php

namespace App\Providers;

use App\Notification;
use App\User;
use Illuminate\Support\Facades\Log;
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
                switch($notification->type){
                    case 'new_konseling':
                        break;
                    case 'end_konseling':
                        break;
                    case 'ask_referral':
                        break;
                    case 'agreed_referral':
                        break;
                    case 'declined_referral':
                        break;
                    case 'ask_conference':
                        break;
                    case 'agreed_conference':
                        break;
                    case 'declined_conference':
                        break;
                }
                Log::info('Sending email ... ');
                Log::info($email);
            });
    }
}
