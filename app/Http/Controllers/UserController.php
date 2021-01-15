<?php

namespace App\Http\Controllers;
use App\Konseli;
use App\Konselor;
use App\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public $successStatus = 200;

    public function index(){
        $users = User::get();
        return response()->json([
            'success' => true,
            'rows' => $users
        ]);
    }

    public function show($id){
        $user = User::find($id);
        if($user){
            if($user->role == 'konseli'){
                $user->info = Konseli::where('user_id', $user->id)->first();
            }
            return response()->json([
                'success'=>true,
                'message'=>'',
                'data'=>$user
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'',
                'data'=>null
            ]);
        }
    }

    public function adminLogin(){
        $validator = Validator::make(request()->all(), [
            'username' => 'required',
            'password' => 'required',
        ], [
            "required" => ":attribute belum diisi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()
            ], 401);
        }

        if ($token = auth()->attempt(['name' => request('username'), 'password' => request('password'), 'role' => 'admin'])) {
            $user = User::where('name', request('username'))->first();
            if($user){
                $token = JWTAuth::fromUser($user);
                return response()->json([
                    'success'=>true,
                    'message'=>'',
                    'token'=>$token
                ]);
            }else{
                return response()->json([
                    'error' => true,
                    'message' => [
                        'err'=>['username atau password salah']
                    ],
                ]);
            }
        }else{
            return response()->json([
                'error' => true,
                'message' => [
                    'err'=>['username atau password salah']
                ],
            ]);
        }
    }
    public function login() {
//        dd(session()->all());
//
        // dd(request()->all());
        if ($token = auth()->attempt(['email' => request('email'), 'password' => request('password'), 'role' => request('role')])) {
//            $oClient = OClient::where('password_client', 1)->first();
            $user = User::where('email', request('email'))->first();
            if($user){
                if($user->role=='konseli'){
                    $user->info = Konseli::where('user_id', $user->id)->first();
                    session(['userId' => $user->id]);
                    return response()->json([
                        'success'=>true,
                        'message'=>'',
                        'data'=>$user
                    ]);
                }else{ if($user->role=='konselor')
                    $user->info = Konselor::where('user_id', $user->id)->first();
//                    session(['userId', $user->id]);
                    session()->put('userId', $user->id);
                    session()->save();
                    return response()->json([
                        'success'=>true,
                        'message'=>'',
                        'userId'=>session('userId')
                    ]);
                }
            }{
                return response()->json([
                    'success'=>false,
                    'message'=>'',
                    'data'=>null
                ]);
            }
        }
        else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function konseliLogin($email, $password){
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'konseli'])) {
            $user = User::where('email', $email)->first();
            if($user){
                if($user->role=='konseli'){
                    $user->info = Konseli::where('user_id', $user->id)->first();
                    return response()->json([
                        'success'=>true,
                        'message'=>'',
                    ]);
                }else{
                    if($user->role=='konselor')
                        $user->info = Konselor::where('user_id', $user->id)->first();
                    return response()->json([
                        'success'=>true,
                        'message'=>'',
                        'data'=>$user
                    ]);
                }
            }{
                return response()->json([
                    'success'=>false,
                    'message'=>'',
                    'data'=>null
                ]);
            }
        }
        else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function storeBase64($image_64){
        $image_64 = substr($image_64, strpos($image_64,",")+1);
        $file = base64_decode($image_64);
        $folderName = 'public/avatars/';
        $safeName = Str::random(10).'.'.'png';
        $destinationPath = public_path() . $folderName;
        $success = file_put_contents(public_path().'/avatars/'.$safeName, $file);
        return $safeName;
    }

    public function siasatLogin(Request $request){
        $nim = 672018200;
        $password = 814413;
        $nim = $request->email;
        $password = $request->password;
        $http = new Client;
        // $response = $http->request('GET', 'https://promager.com/service/link/login/?nim='.$nim.'&pas='.$password, [
        // ]);
        $response = $http->request('GET', 'https://stars.uksw.edu/services/link/login?nim='.$nim.'&pas='.$password, [
        ]);

        $result = json_decode((string) $response->getBody(), true);

        // $result[0]['kondisi'] == 'True';
        if($result[0]['kondisi'] == 'True'){
            // $mahasiswa = Http::get('https://promager.com/service/link/mahasiswa/?nim='.$nim)->json()[0];
            $mahasiswa = Http::get('https://stars.uksw.edu/services/link/mahasiswa?nim='.$nim)->json()[0];
            // $mahasiswa['nim'] = $request['email'];
            $user = User::where('email',$mahasiswa['email'])->first();
            $konseli = Konseli::where('nim', $mahasiswa['nim'])->first();
            if($konseli){
//                jika sudah register
                session()->put('userId', $user->id);
                session()->save();
                $user = User::find($konseli->user_id);
                $x = $this->konseliLogin($user->email, 'siko');
                $x->original['action'] = 'login';
                return response()->json($x->original);
                $mahasiswa['action'] = 'login';
                return response()->json([
                    "error" => true
                ]);
            }else{

                return response()->json([
                    'success' => true,
                    'error' => false,
                    'message' => '',
                    'data' => $mahasiswa,
                    'action' => 'register'
                ]);
            }

        }
        return response()->json([
            'error' => true,
            'message' => 'NIM atau password salah',
        ]);
    }

    public function changePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'password_lama' => 'required',
            'password' => 'required',
            'repeat' => 'required|same:password'
        ], [
            "required" => ":attribute belum diisi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()
            ], 401);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password_lama, 'role' => $request->role])){
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();
            $token = JWTAuth::fromUser($user);
            return response()->json([
                'success' => true,
                'message' => 'password berhasil diubah!',
                'token' => $token
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => ['err'=>'Password yang anda masukkan salah']
            ]);
        }

    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nim' => 'required',
            'nama_konseli' => 'required',
            'tgl_lahir_konseli' => 'required',
            'no_hp_konseli' => 'required',
            'alamat_konseli' => 'required',
            'progdi' =>  'required',
            'jenis_kelamin' => 'required',
            'suku' => 'required',
            'agama' => 'required'
        ], [
            "required" => ":attribute belum diisi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()
            ], 401);
        }

        $password = $request->password;
        $input = $request->all();
        $input['password'] = 'siko';
        $input['password'] = bcrypt($input['password']);
        $input['prodi_id'] = 1;
        $input['role'] = 'konseli';
        $input['avatar'] = 'default.jpg';
        $user = User::create($input);
        $input['user_id'] = $user->id;
        //todo: user dulu!
        //konseli
        $konseli = Konseli::create($input);

        if($request->avatar != null){
            $avatar = $this->storeBase64($request->avatar);
            $user->avatar = $avatar;
            $user->save();
        }

//        session()->put('userId', $user->id);

        return response()->json([
            'success'=>true,
            'message'=>'',
            // 'token'=> $this->getTokenAndRefreshToken($oClient, $user->email, $password)
        ]);

    }

    public function getTokenAndRefreshToken(OClient $oClient, $email, $password) {

        $oClient = OClient::where('password_client', 1)->first();
        $http = new Client;
        $response = $http->request('POST', env('OAUTH_HOST').'/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $oClient->id,
                'client_secret' => $oClient->secret,
                'username' => $email,
                'password' => $password,
                'scope' => '*',
            ],
        ]);

        $result = json_decode((string) $response->getBody(), true);
        return response()->json($result, $this->successStatus);
    }
}
