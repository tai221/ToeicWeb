<?php
namespace App\Repositories\Eloquents;
use App\Account;
use Illuminate\Support\Facades\Log;

class AccountRepository
{
    public function all()
    {
        return Account::all();
    }

    public function getAccountByField($field, $value)
    {
        return Account::where($field, $value)->first();
    }

    public function searchAccounByField($field, $value)
    {
        return  Account::where($field, 'LIKE', '%'.$value.'%')->get();
    }

    public function storeAccount($data)
    {
        Account::create($data->all());
    }

    public function updateAccount($id, $data)
    {
        Account::updateOrCreate(
            ['id' => $id],
            [
                "username" => $data["username"],
                "email" => $data["email"],
                "password" => $data["password"],
                "hasRole" => $data["hasRole"]
            ]
        );
    }

    public function banOrUnbanAccount($id)
    {
        $account = Account::where('id', $id)->first();
        $active = $account->active;
        if($active == 1) {
            $account->update(['active' => 0]);
        } else {
            $account->update(['active' => 1]);
        }
    }

    public function deleteAccount($id)
    {
        Account::where('id', $id)->delete();
    }


}
