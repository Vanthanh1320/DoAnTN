<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;


class postSimilar extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $user,$kills;
    private $post_similar=[];

    public function __construct($user,$kills,$post_similar)
    {
        $this->user=$user;
        $this->kills=$kills;
        $this->post_similar=$post_similar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vodat1320@gmail.com','IT DaNang')->view('developer.postSimilarMail')
            ->subject('Việc làm phù hợp ngày hôm nay '. Carbon::now()->isoFormat('D/M'))
            ->with([
                'name'=> $this->user->name,
                'kills'=> $this->kills,
                'post_similar'=>$this->post_similar
            ]);
    }
}
