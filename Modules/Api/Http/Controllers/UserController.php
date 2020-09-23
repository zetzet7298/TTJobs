<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Api\Entities\SessionUser;
use Modules\Api\Entities\User;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function register(Request $request){
        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
//        $userCreate = $user->save();
        $userCreate = User::created($data);

        return response()->json([
            'code' => 201,
            'data' => $userCreate
        ],201);
    }

    public function login(Request $request){
        $dataCheck = [
          'email' => $request->email,
          'password' => $request->password
        ];
//
//        if(auth()->attempt($dataCheck)){
//            $checkTokenExists = SessionUser::where('user_id', auth()->id())->first();
//            if(empty($checkTokenExists)){
//                $dataSession = [
//                    'token' => Str::random(40),
//                    'refresh_token' => Str::random(40),
//                    'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
//                    'refresh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
//                    'user_id' => auth()->id()
//                ];
//                $userSession  = SessionUser::create($dataSession);
//            }else{
//                $userSession = $checkTokenExists;
//            }
//            return response()->json([
//                'code' => 200,
//                'data' => $userSession
//            ], 200);
//        }
//        return response()->json([
//            'code' => 401,
//            'message' => 'Check username or password!'
//        ], 200);
        $credentials = request(['email', 'password']);
        if(!auth()->attempt($dataCheck))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = User::where('email' , $request->email)->first();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request){
        $user = User::where('id',auth()->id())->first();dd($user);
        $user->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function index()
    {
        dd('asd');
        return view('api::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('api::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('api::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('api::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
