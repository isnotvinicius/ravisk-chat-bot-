<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('discord:bot', function () {
    $this->call('App\Console\Commands\DiscordBotCommand');
})->describe('Starts Discord bot');

