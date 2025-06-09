<?php

namespace App\Discord;

class CommandHandler
{
    protected $commands = [
        'vinixas' => 'Vinixas já serviu como outdoor {random} vezes (testona da porra)',
        'conhem' => 'A fortuna da herança do Conhem está atualmente avaliada em R${random}',
        'ravisk' => 'O Ravisk - vulgo Arauto do Vale - já cabeçeou {random} torres',
        'sarx' => 'Sarx já entregou {random} pacotes de dorgas como aviãozinho no RP',
        'pesadelo' => 'Pesadelo já carpiu {random} matos, nosso periquito do governo',
        'lorenzo' => 'Lorenzetti já queimou a resistência {random} vezes - lá ele',
        'vrilipe' => 'Felipe já comprou {random} jogos, e não zerou nenhum',
    ];

    public function handle($command)
    {
        if ($command === 'comandos') {
            return $this->listCommands();
        }

        if (!isset($this->commands[$command])) {
            return null;
        }

        $response = $this->commands[$command];

        [$min, $max] = match ($command) {
            'conhem' => [1_000_000, 5_000_000],
            default => [1, 500],
        };

        $randomNumber = rand($min, $max);

        return str_replace('{random}', number_format($randomNumber, 0, ',', '.'), $response);
    }

    protected function listCommands()
    {
        $commandList = array_keys($this->commands);
        $formattedList = implode("\n", $commandList);

        return "📋 Comandos disponíveis:\n" . $formattedList . "\n\nUse qualquer comando para ver uma mensagem personalizada.";
    }
}
