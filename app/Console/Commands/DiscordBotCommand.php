<?php

namespace App\Console\Commands;

use App\Discord\Bot;
use Illuminate\Console\Command;

class DiscordBotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discord:bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts Discord bot';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $this->info("starting bot...");
        $bot = new Bot();
        $bot->run();
    }
}
