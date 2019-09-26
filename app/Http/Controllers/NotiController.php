<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class NotiController extends Controller
{
    public function getNoti(){
        $admin = Account::find(20);
        return $admin->unreadNotifications;
    }

    public function markAsRead(){
        $admin = Account::find(20);
        $admin->unreadNotifications->markAsRead();
    }
}
