<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class OrderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    public $order_email_template_with_data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $order_email_template_with_data)
    {
        $this->email = $email;
        $this->order_email_template_with_data = $order_email_template_with_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('emails.order-email-template', ['order_email_template_with_data' => $this->order_email_template_with_data], function ($message) {
            $message->to($this->email)
                    ->subject('Order');
        });
    }
}
