<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class WelcomeMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $email;
    public $welcome_template;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $welcome_template)
    {
        $this->email = $email;
        $this->welcome_template = $welcome_template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.welcome-email-template', ['welcome_template' => $this->welcome_template], function ($message) {
            $message->to($this->email)
                    ->subject('Welcome');
        });
    }
}
