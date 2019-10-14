<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\AccountRegisterRequest;
use App\Http\Requests\AccountStoreRequest;
use App\Repositories\Eloquents\AccountRepository;
use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    protected $accountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->accountRepository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchByField(Request $request)
    {
        $value = $request['inputSearch'];
        return $this->accountRepository->searchAccounByField('username', $value);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountStoreRequest $request)
    {
        $username = $request["username"];
        $email = $request["email"];
        $res = array();
        $checkUserName = $this->accountRepository->getAccountByField('username', $username);
        $checkEmail = $this->accountRepository->getAccountByField('email', $email);

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

        if($checkUserName) {
            $res["checkUsername"] = true;
        } else {
            $res["checkUsername"] = false;
        }

        if($checkEmail){
            $res["checkEmail"] = true;
        } else {
            $res["checkEmail"] = false;
        }

        if($res["checkUsername"] == false && $res["checkEmail"] == false) {
            $this->accountRepository->storeAccount($request);
        }

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
        return $this->accountRepository->getAccountByField('id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->accountRepository->banOrUnbanAccount($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, AccountStoreRequest $request)
    {
        $username = $request["username"];
        $email = $request["email"];
        $res = array();
        $checkUserName = $this->accountRepository->getAccountByField('username', $username);
        $checkEmail = $this->accountRepository->getAccountByField('email', $email);

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
            $this->accountRepository->updateAccount($id, $request);
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
        return $this->accountRepository->deleteAccount($id);
    }

    public function register(AccountRegisterRequest $request)
    {
        $username = $request["username"];
        $email = $request["email"];
        $res = array();
        $checkUserName = $this->accountRepository->getAccountByField('username', $username);
        $checkEmail = $this->accountRepository->getAccountByField('email', $email);

        if($checkUserName) {
            $res["checkUsername"] = true;
        } else {
            $res["checkUsername"] = false;
        }

        if($checkEmail){
            $res["checkEmail"] = true;
        } else {
            $res["checkEmail"] = false;
        }

        if($res["checkUsername"] == false && $res["checkEmail"] == false) {
            $this->accountRepository->storeAccount($request);
        }

        return $res;
    }
}
