<?php

namespace App\Jobs;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected WelcomeMailRequestDTO $mailRequest;

    public function __construct(WelcomeMailRequestDTO $mailRequest)
    {
        $this->mailRequest = $mailRequest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mailRequest->getEmail())->queue(new WelcomeMail());
    }
}
