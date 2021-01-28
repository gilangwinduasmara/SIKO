<?php

namespace App\Mail;

use App\Notification;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $notification, $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Notification $notification, $data)
    {
        $this->notification = $notification;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = User::find(session('userId'));

        return $this->view('emails.notif')->with([
            'notification' => $this->notification,
            'user' => $this->user,
            'data' => $this->data
        ]);
    }
}
