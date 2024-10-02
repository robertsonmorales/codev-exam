<?php

use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\FetchPost;

Schedule::command(FetchPost::class)->everyMinute();
