<?php

namespace App\Mail;

use App\User;
use App\Posts;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostDeleted extends Mailable
{
    use Queueable, SerializesModels;
    public $post;
    public $user;
    public $adminMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Posts $post, User $user, $adminMessage)
    {
        $this->post = $post;
        $this->user = $user;
        $this->adminMessage = $adminMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.postDeleted')
                    ->attach($this->post->imageName,[
                        'as' => 'img.png',
                        'mime' => 'application/png',
                    ]);
    }
}
