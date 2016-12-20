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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Posts $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $destinationPath = public_path(config('constants.postsPath'));
        // $image = $destinationPath+'/'+$post->imageName;
        return $this->view('emails.postDeleted')
                    // ->attach($destinationPath+'/'+$post->imageName, [
                    //     'as' => 'image.png',
                    //     'mime' => 'application/png',
                    // ])
                    ;
    }
}
