<?php

namespace App\Console\Commands;

use App\Article;
use Illuminate\Support\Facades\Mail;
use App\Mail\Newsletter as MailNewsletter;
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
        $articles = Article::whereDate('published_at','>=', now()->startOfWeek())->get();
        //dd($articles);
        foreach ($users as $email) {
            # code...
             Mail::to($users)->queue(new MailNewsletter($email, $articles));
        }
        $this->info('job finished');
    }
}
