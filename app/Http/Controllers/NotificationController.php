<?php

namespace App\Http\Controllers;

use App\CaseConference;
use App\Konseling;
use App\Notification;
use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function count($user_id, Request $request){
        if($request->has('chat'))
            $notification = Notification::where('user_id',$user_id)->whereNull('read_at')->where('type', 'chat')->get();
        else
            $notification = Notification::where('user_id',$user_id)->whereNull('read_at')->where('type', '!=', 'chat')->get();
        return response()->json([
            'success'=>true,
            'message'=>'',
            'data'=>count($notification)
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function read($id){
        $this->assignUser();
        $user = $this->user;
        $notif = Notification::find($id);
        if($notif->read_at != null){
            return redirect()->back();
        }
        if($notif->type == 'chat'){
            $data = $notif->data;
            $chats = Notification::where('data', $data)->update(['read_at' => now()]);
        }
        $notif->read_at = now();
        $notif->save();
        if($notif->type == 'chat'){
            if($user->role === 'konseli'){
                return redirect('/ruangkonseling');
            }
            if($user->role === 'konselor'){
                return redirect('/daftarkonseli?open&id='.$notif->data);
            }
        }

        if($notif->type == 'new_referral'){
            return redirect('/daftarkonseli?open&id='.$notif->data);
        }

        if($notif->type == 'new_conference'){
            return redirect('/caseconference?id='.$notif->data);
        }

        if($notif->type == 'ask_referral'){
            if($user->role === 'konseli'){
                return redirect("/dashboard#modal__referral");
            }
        }

        if($notif->type == 'ask_conference'){
            if($user->role === 'konseli'){
                return redirect("/dashboard#modal__case_conference");
            }
        }

        if($notif->type == 'agreed_referral'){
            if($user->role === 'konselor'){
                return redirect("/setup/referral?id=".$notif->data);
            }
        }
        if($notif->type == 'declined_referral'){
            if($user->role === 'konselor'){
                return redirect("/setup/referral?id=".$notif->data);
            }
        }

        if($notif->type == 'agreed_conference'){
            if($user->role === 'konselor'){
                return redirect("/setup/caseconference?id=".$notif->data);
            }
        }

        if($notif->type == 'declined_conference'){
            if($user->role === 'konselor'){
                return redirect("/setup/caseconference?id=".$notif->data);
            }
        }

        if($notif->type == 'new_konseling'){
            if($user->role === 'konselor'){
                return redirect("/daftarkonseli?open&id=".$notif->data);
            }
        }

        if($notif->type == 'end_konseling'){
            if($user->role === 'konselor'){
                return redirect("/daftarkonseli?id=".$notif->data);
            }
        }

        return redirect('/dashboard');

    }

    public function index(Request $request)
    {
        $this->assignUser();
            $user = $this->user;
        $n = [];
        $dataGroups = Notification::where('type','chat')->where('user_id', $user->id)->orderBy('created_at', 'desc')->where('read_at')->get()->groupBy('data');
        foreach($dataGroups as $group){
            array_push($n, head($group)[0]);
        }
        $notifications = Notification::where('type', '!=', 'chat')->where('user_id', $user->id)->where('read_at')->get();
        foreach($notifications as $notif){
            array_push($n, $notif);
        }
        // return response()->json([
        //     'success'=>true,
        //     'message'=>'',
        //     'rows'=>$n,
        // ]);
        if(true){
            $notifications = Notification::where('read_at')->where('type','chat')->where('user_id', $user->id)->get()->groupBy(['data']);
            $notification = [];
            foreach($notifications as $n){
                $konseling = Konseling::find($n[0]['data']);
                if($konseling){
                    if($konseling->status_selesai == "C" && $konseling->refered != "ya"){
                        array_push($notification, $n[count($n)-1]);
                    }
                }
            }
            $askReferral = [];
            $_askReferrals = Notification::whereIn('type', ['ask_referral', 'agreed_referral', 'declined_referral'])->where('type','!=','chat')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get()->groupBy(['type'])->first();
            if($_askReferrals){
                $_askReferrals->toArray();
                foreach($_askReferrals as $ar){
                    $k = Konseling::where('status_selesai', 'C')->where('refered','!=','ya')->where('id',$ar['data'])->get();
                    if($user->role == 'konseli'){
                        $k = Konseling::where('status_selesai', 'C')->where('refered','ask')->where('id',$ar['data'])->get();
                    }
                    if(count($k)>0){
                        array_push($notification, $ar);
                    }
                };
            }
            $askConference = [];
            $_conferences = Notification::where('read_at')->where('user_id', $user->id)->whereIn('type', ['ask_conference','agreed_conference','invitation_conference', 'declined_conference'])->orderBy('created_at')->get();
            // return response()->json([$_conferences]);
            foreach($_conferences as $c){
                $conf = Konseling::find($c->data);
                if($c->type == 'ask_conference'){
                    if($conf->conferenced != 'ask'){
                        continue;
                    }
                }
                if($c->type == 'ask_referral'){
                    if($conf->refered != 'ask'){
                        continue;
                    }
                }
                array_push($notification, $c);
            }

            $_others = Notification::where('read_at')->where('user_id', $user->id)->whereIn('type', ['new_konseling', 'end_konseling'])->orderBy('created_at')->get();
            foreach ($_others as $o) {
                if($o->type == 'new_konseling'){
                    $k = Konseling::with('chats')->find($o->data);
                    if($k->status_selesai == 'C' && $k->refered != "ya" && count($k->chats) == 0){
                        array_push($notification, $o);
                    }
                }
                if($o->type == 'end_konseling'){
                    $k = Konseling::with('rangkumanKonseling')->find($o->data);
                    if($k->rangkumanKonseling == null){
                        array_push($notification, $o);
                    }
                }
            }
        }
        return response()->json([
            'success'=>true,
            'message'=>'',
            'rows'=>$notification,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
