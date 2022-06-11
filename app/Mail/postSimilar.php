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

    private $user;
    private $post_similar=[];

    public function __construct($user,$post_similar)
    {
        $this->user=$user;
        $this->post_similar=$post_similar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('','IT DaNang')->view('developer.postSimilarMail')
            ->subject('Việc làm phù hợp ngày hôm nay '. Carbon::now()->isoFormat('D/M'))
            ->with([
                'name'=> $this->user->name,
                'post_similar'=>$this->post_similar
            ]);
    }
}
