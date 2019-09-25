<?php

namespace App\Console\Commands;

use App\Jobs\SendTodoMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        $account = DB::table('accounts')->where('username','afsfds')->first();
        dispatch(new SendTodoMail($account))->onConnection('database');;
    }
}
