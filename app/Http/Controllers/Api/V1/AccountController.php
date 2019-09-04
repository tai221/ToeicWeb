<?php

namespace App\Http\Controllers\Api\V1;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Account::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request["username"];
        $email = $request["email"];
        $password = $request["password"];
        $hasRole = $request["hasRole"];

        $account = new Account();
        $account->username = $username;
        $account->email = $email;
        $account->password = Hash::make($password);
        $account->hasRole = $hasRole;
        $account->active = 1;

        $res = array();
        $checkUserName = Account::where('username', $username)->get();
        $checkEmail = Account::where('email', $email)->get();

        //codecu------
//        if(sizeof($checkUserName) > 0 && sizeof($checkEmail) > 0 ) {
//            $res["checkUsername"] = true;
//            $res["checkEmail"] = true;
//        } elseif(sizeof($checkUserName) > 0) {
//            $res["checkUsername"] = true;
//            $res["checkEmail"] = false;
//        } elseif(sizeof($checkEmail) > 0) {
//            $res["checkUsername"] = false;
//            $res["checkEmail"] = true;
//        } else {
//            $account->save();
//            $res["checkUsername"] = false;
//            $res["checkEmail"] = false;
//        }
        //-------------

        if(sizeof($checkUserName) > 0) {
            $res["checkUsername"] = true;
        } else {
            $res["checkUsername"] = false;
        }

        if(sizeof($checkEmail) > 0){
            $res["checkEmail"] = true;
        } else {
            $res["checkEmail"] = false;
        }

        if($res["checkUsername"] == false && $res["checkEmail"] ==false) {
            $account->save();
        }
//        $account = Account::create($request->all());

        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::where('id', $id)->first();
        return $account;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::where('id', $id)->first();
        $active = $account->active;
        if($active == 1) {
            $account->update(['active' => 0]);
        } else {
            $account->update(['active' => 1]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $username = $request["username"];
        $email = $request["email"];
        $password = $request["password"];
        $hasRole = $request["hasRole"];

        $account = Account::find($id);
        $account->username = $username;
        $account->email = $email;
        $account->password = Hash::make($password);
        $account->hasRole = $hasRole;

        $res = array();
        $checkUserName = Account::where('username', $username)->first();
        Log::info($checkUserName);
        $checkEmail = Account::where('email', $email)->first();

        if($checkUserName["id"] == '' || $checkUserName["id"] == $id){
            $res["checkUsername"] = false;
        } else {
            $res["checkUsername"] = true;
        }

        if($checkEmail["id"] == ''|| $checkEmail["id"] == $id){
            $res["checkEmail"] = false;;
        } else {
            $res["checkEmail"] = true;
        }

        if(!$res["checkUsername"] && !$res["checkEmail"]){
            $account->save();
        }

        return $res;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteAccount = Account::where('id', $id)->delete();
        return '';
    }
}
