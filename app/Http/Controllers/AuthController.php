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
        $username = $request['username'];
        $password = $request['password'];
        try {
            $request->request->add([
                'grant_type' => 'password',
                'client_id' => config('services.passport.client_id'),
                'client_secret' => config('services.passport.client_secret'),
                'username' => $username,
                'password' => $password,
                'scope' => '*'
            ]);
            $tokenRequest = Request::create(
                config('services.passport.login_endpoint'),
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
            Log::info('auth check');
            auth()->user()->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }
        return response()->json('logout success!', 200);
    }

    public function getUserInfo() {
        return auth()->user()->username;
    }
}
