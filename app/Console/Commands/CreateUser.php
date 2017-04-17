<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create User Command description';

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
        $answerPassword = $this->ask('Enter password');
        $answerInfo = $this->ask('Enter information');


        DB::insert('insert into users (name, password, info) values (?, ?, ?)', [$answerUser, $answerPassword, $answerInfo]);
        echo 'Added user '. $answerUser;


    }
}
