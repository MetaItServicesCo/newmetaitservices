<?php

namespace App\Mail;

use App\Models\Services;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewServicePublished extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Services $service)
    {
    }

    public function build()
    {
        return $this->subject('New service: ' . $this->service->title)
            ->view('emails.new-service-published');
    }
}
