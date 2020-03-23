<?php

namespace App\Console\Commands;

use App\Newsletter;
use Illuminate\Console\Command;


class SendNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:send-newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending email for all subscribed users';

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
        //
        $users = Newsletter::pluck('mail');

        foreach ($users as $email) {
            # code...
        }
        $this->info('job finished');
    }
}
