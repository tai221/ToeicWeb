<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class Account extends Authenticatable
{
    //
    use HasApiTokens, Notifiable;

    protected $fillable=['id','username','password','email','hasRole','active'];

    protected $rememberTokenName = false;

    function discussion(){
        return $this -> hasMany('App\Discussion','idAcc');
    }
    function comment(){
        return $this -> hasMany('App\Comment', 'idAcc');
    }
    function test(){
        return $this -> belongsToMany('App\Test','map_user_tests') -> withPivot('ngayLam');
    }
    function replyComment(){
        return $this -> hasMany('App\ReplyComment', 'idAcc');
    }
    function report(){
        return $this -> hasMany('App\Report', 'idAcc','id');
    }
    function listeningPart(){
        return $this -> belongsToMany('App\ListeningPart','map_user_listenings') -> withPivot('ngayLam');
    }
    function readingPart(){
        return $this -> belongsToMany('App\ReadingPart','map_user_readings') -> withPivot('ngayLam');
    }
    //custom password field
    public function getAuthPassword(){
        return $this->password;
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }

    //---------------
    //custom check username and password in Password Grant
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
    public function validateForPassportPasswordGrant($password)
    {
        return Hash::check($password, $this->password);
    }
    //----------------

}
