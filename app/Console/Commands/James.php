<?php

namespace App\Console\Commands;

use IDevCode\Word;
use Illuminate\Console\Command;
class James extends Command
{
    protected $signature = "james";


    public function handle()
    {

$x = new Word();
dump($x->getWord());

    }
}