<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBlogPublished extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Blog $blog)
    {
    }

    public function build()
    {
        return $this->subject('New blog: ' . $this->blog->title)
            ->view('emails.new-blog-published');
    }
}
