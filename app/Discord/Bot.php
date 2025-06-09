<?php

namespace App\Discord;

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

Class Bot
{
    public function run()
    {
        $discord = new Discord([
            'token' => env("DISCORD_TOKEN"),
            'intents' => Intents::getDefaultIntents()
        ]);

        $discord->on('init', function (Discord $discord) {
            echo "Bot is ready!", PHP_EOL;

            $discord->on(Event::MESSAGE_CREATE, function ($message, $discord) {
                if ($message->author->bot) return;

                $handler = new CommandHandler();

                $response = $handler->handle(preg_replace('/\s*<[^>]*>\s*/', '', $message->content));

                if ($response) {
                    $message->reply($response);
                }
            });
        });

        $discord->run();
    }
}