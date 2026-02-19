<?php

namespace App\Jobs;

use App\Mail\NewBlogPublished;
use App\Models\Blog;
use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewBlogPublishedEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private int $blogId)
    {
    }

    public function handle(): void
    {
        $blog = Blog::where('is_active', true)->find($this->blogId);

        if (! $blog) {
            return;
        }

        Newsletter::active()
            ->select('id', 'email')
            ->orderBy('id')
            ->chunkById(100, function ($subscribers) use ($blog) {
                foreach ($subscribers as $subscriber) {
                    Mail::to($subscriber->email)->send(new NewBlogPublished($blog));
                }
            });
    }
}
