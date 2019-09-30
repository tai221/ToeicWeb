<?php
namespace App\Repositories\Eloquents;
use App\Account;

class AccountRepository
{
    public function all()
    {
        return Account::all();
    }

    public function getAccountByField($field, $value)
    {
        return Account::where($field, $value)->get();
    }


}
