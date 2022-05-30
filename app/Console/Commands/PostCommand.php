<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recruitment:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status recruitment';

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
//        return 0;
        DB::table('recruitment')->where('expire','<',now())->update(['status' => 0]);

    }
}
