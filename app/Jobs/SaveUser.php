<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SaveUser implements ShouldQueue
{
    use Queueable;
    public $user;


    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {

        

    }
}
