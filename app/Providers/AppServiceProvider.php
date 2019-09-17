<?php

namespace App\Providers;

use App\ApplePay;
use App\CreaditCard;
use App\PaymentInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( PaymentInterface::class,function(){
           if(request('method') == 1){
               return new CreaditCard;
           }
           return new ApplePay;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
