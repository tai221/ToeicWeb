<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login(Request $request){
        Log::info($request);
        $username = $request['username'];
        $password = $request['password'];
//        $account = Account::where('username',$username)->first();
//        $token = $account->createToken('Access Token')->accessToken;
//        return $token;
        try {
            $request->request->add([
                'grant_type' => 'password',
                'client_id' => 7,
                'client_secret' => 'NaokSGVxTXpokoeURvhUUpgLTnYGEYzq9UHGtOE7',
                'username' => $username,
                'password' => $password,
                'scope' => '*'
            ]);
            $tokenRequest = Request::create(
                'http://127.0.0.1:8000/oauth/token',
                'post'
            );
            $response = Route::dispatch($tokenRequest);
            return $response;
        } catch (BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }

    public function logout(){
        if (Auth::check()) {
            auth()->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }
        return response()->json('logout success!', 200);
    }
}
