<?php

namespace App\Console\Commands;

use App\Mail\postSimilar;
use App\Models\ApplyList;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class sendMailAutomatic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recruitment:select';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail Post Similar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apply_list=ApplyList::with('recruitment','user')->get();

        for ($i = 0; $i < count($apply_list); $i++){
            $kills=explode(',',$apply_list[$i]->recruitment->kills);

            $post_similar=Recruitment::where(function ($query) use ($kills,$apply_list){
                for ($i=0;$i< count($kills);$i++) {
                    $query->orWhere('kills','like','%'.$kills[$i].'%')
                        ->Where('id', '<>',$apply_list[$i]->recruitment_id)
                        ->Where('status', 1)
                        ->Where('created_at','>',$apply_list[$i]->created_at);
                }
            })->get();

            if (count($post_similar) > 2){
                $mailable=new postSimilar($apply_list[$i]->user,$post_similar);
                Mail::to($apply_list[$i]->user->email)->queue($mailable);
            }
        }

    }
}
