<?php

namespace App\Http\Controllers;

use App\PaymentInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $payment;
    public function __construct(PaymentInterface $payment)
    {
//        $this->middleware('auth');
        $this->payment = $payment;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pay(){
        $this->payment->purchase();
    }
}
