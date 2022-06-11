<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmProfile extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user_developer,$post;

    public function __construct($user_developer,$post)
    {
        $this->user_developer=$user_developer;
        $this->post=$post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vodat1320@gmail.com','IT DaNang')->view('employer.confirm_profile_mail')
            ->subject('Nhà tuyển dụng đã xác nhận hồ sơ của bạn')
            ->with([
                'name'=> $this->user_developer->name,
                'post'=> $this->post->title,
                'company'=> $this->post->name_company,
            ]);
    }
}
