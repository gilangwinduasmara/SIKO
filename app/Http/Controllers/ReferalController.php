<?php

namespace App\Http\Controllers;

use App\CaseConference;
use App\JadwalKonselor;
use App\Referal;
use App\Konseling;
use App\Konselor;
use App\Notification;
use Illuminate\Http\Request;
use Validator;

class ReferalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referals = Referal::all();
        return response()->json([
            'success' =>true,
            'message' => '',
            'rows' => $referals
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
        $roleValidator = Validator::make($request->all(), [
            'judul_referral' => 'required',
            'pesan_referral' => 'required',
            'jadwal_konselor_id' => 'required|exists:jadwal_konselors,id',
            'konseling_id' => 'required|exists:konselings,id',
            'konselor_tujuan_id' => 'required|exists:konselors,id',
        ]);

        if($roleValidator->fails()){
            return response()->json([
                'success' => false,
                'message' => $roleValidator->errors()
            ]);
        }
        $inputs = $request->all();
        $inputs['tgl_referral'] = now();

        $konseling = Konseling::with('konselor')->where('id', $request->konseling_id)->first();
        $konseling->refered = 'ya';
        $jadwalRefered = JadwalKonselor::find($konseling->jadwal_konselor_id);
        $jadwalRefered->available = "true";
        $jadwalRefered->save();
        $conference = CaseConference::where('konseling_id', $konseling->id)->where('status','on-going')->first();
        $konseling->save();
        $referal = Referal::create($inputs);
        $jadwal = JadwalKonselor::find($inputs['jadwal_konselor_id']);
        $konseling->save();
        if($conference){
            $conference->status = 'selesai';
            $conference->save();
        }

        $newConseling = Konseling::create([
            'tgl_daftar_konseling' => $inputs['tgl_referral'],
            'tgl_akhir_konseling' => now()->addDay(30),
            'tgl_expired_konseling' => now()->addDay(30),
            'status_konseling' => 'ref',
            'status_selesai' => 'C',
            'konseli_id' => $konseling->konseli_id,
            'konselor_id' => $request->konselor_tujuan_id,
            'jadwal_konselor_id' => $request->jadwal_konselor_id,
            'referral_id' => $referal->id
        ]);
        $jadwal->available = 'candidate';
        $jadwal->save();

        $tujuan = Konselor::find($request->konselor_tujuan_id);

        $Notification = Notification::create([
            'type' => 'new_referral',
            'title' => $konseling->konselor->nama_konselor,
            'message' => 'Mengirim referal',
            'data' => $newConseling->id,
            'user_id' =>$tujuan->user_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data successfully stored!'
        ]);
    }

    public function declideAgreement(Request $request){
        $konseling = Konseling::with('konseli')->with('konselor')->find($request->konseling_id);
        if($konseling->refered == 'ask'){
            $konseling->refered = 'declined';
            $konseling->save();

            $Notification = Notification::create([
                'type' => 'declined_referral',
                'title' => $konseling->konseli->nama_konseli,
                'message' => 'Persetujuan referal ditolak',
                'data' => $konseling->id,
                'user_id' =>$konseling->konselor->user_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'data updated!'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'nothing was changed'
        ]);
    }

    public function createAgreement(Request $request){
        $this->assignUser();
        $konseling = Konseling::with(['konseli'])->with('konselor')->where('id',$request->konseling_id)->first();
        if ($konseling->refered == 'tidak' || $konseling->refered == 'declined'){
            $konseling->refered = 'ask';
            $Notification = Notification::create([
                'type' => 'ask_referral',
                'title' => $konseling->konselor->nama_konselor,
                'message' => 'Permintaan persetujuan referal',
                'data' => $konseling->id,
                'user_id' =>$konseling->konseli->user_id
            ]);
        } else if ($konseling->refered == 'ask' && $konseling->konseli_id == $this->user->details->id){
            $konseling->refered = 'agreed';
            $Notification = Notification::create([
                'type' => 'agreed_referral',
                'title' => $konseling->konseli->nama_konseli,
                'message' => 'Menyetujui permintaan referal',
                'data' => $konseling->id,
                'user_id' =>$konseling->konselor->user_id
            ]);
        }
        $konseling->save();
        return response()->json([
            'success' => true,
            'message' => 'refered status upgraded to '.$konseling->refered
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $referal = Referal::find($id);
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => $referal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referal $referal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Referal  $referal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referal $referal)
    {
        //
    }
}
