<?php

namespace App\Jobs;

use App\Mail\NewServicePublished;
use App\Models\Newsletter;
use App\Models\Services;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewServicePublishedEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private int $serviceId)
    {
    }

    public function handle(): void
    {
        $service = Services::where('is_active', true)->find($this->serviceId);

        if (! $service) {
            return;
        }

        Newsletter::active()
            ->select('id', 'email')
            ->orderBy('id')
            ->chunkById(100, function ($subscribers) use ($service) {
                foreach ($subscribers as $subscriber) {
                    Mail::to($subscriber->email)->send(new NewServicePublished($service));
                }
            });
    }
}
