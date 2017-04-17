<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $answerUser = $this->ask('Enter name');
        $result = DB::select('select * from users where name = ?', [$answerUser]);
        echo 'You selected user '.$result[0]->name."\n";
        echo 'Information - '.$result[0]->info."\n\n";

        $answerInfoUpdate = $this->ask('Enter NEW information');

        DB::update('update users set info = ? where name = ?', [$answerInfoUpdate, $answerUser]);
        echo 'You selected user '.$result[0]->name."\n";
        echo 'updated with information - '.$answerInfoUpdate."\n\n";


        //
    }
}
