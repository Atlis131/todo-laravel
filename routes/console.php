<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('notification:send')->daily('01:00');
