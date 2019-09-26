<?php

namespace App\Console\Commands;

use App\Account;
use App\Jobs\SendTodoMail;
use App\Mail\TodoMail;
use App\Notifications\SendMailToUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Pusher\Pusher;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $account = DB::table('accounts')->where('username','aaaa')->first();
        dispatch(new SendTodoMail($account));
        Account::find(20)->notify(new SendMailToUser());
        $admin = Account::find(20)->unreadNotifications;
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'e6b2660952105b0dc309',
            'e9fe9fa3ccde42d7f00e',
            '869215',
            $options
        );
        $pusher->trigger('send-noti', 'NotificationEvent', $admin);
    }
}
