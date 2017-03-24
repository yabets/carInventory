<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification';

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
        \Log::info('Email sent @ '. \Carbon\Carbon::now());
        Mail::send('email.reminder', ['user' =>'yabets'], function($m){
            $m->from('yokidatest@gmail.com', 'yabets: subject');
            $m->to('yabetsbelay@gmail.com', 'username:eg')->subject('daily notification');
        });
    }
}
