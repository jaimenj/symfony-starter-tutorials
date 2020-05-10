<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
//use Symfony\Component\BrowserKit\Client;
use Goutte\Client;

class TestBrowsingCommand extends Command
{
    protected static $defaultName = 'app:test-browsing';

    protected function configure()
    {
        $this
            ->setDescription('Este comando es una prueba del navegador de Symfony.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $client = new Client();
        //$crawler = $client->xmlHttpRequest('GET', 'https://jnjsite.com/');
        $crawler = $client->request('GET', 'https://jnjsite.com/');

        //var_dump($client);
        $output->writeln('============>> ESTO ES TODO EL CONTENIDO DE LA WEB: ');
        $output->writeln($crawler->html());

        $output->writeln('============>> AHORA SÓLO LOS ENLACES: ');
        foreach ($crawler->filter('a') as $linkNode) {
            //var_dump($linkNode);
            /*foreach ($linkNode->attributes as $key => $value) {
                if($key == 'href') {
                    var_dump($key);
                    var_dump($value);
                }
            }*/
            if (isset($linkNode->attributes['href'])) {
                $output->writeln($linkNode->nodeValue.': '.$linkNode->attributes['href']->value);
            }
        }

        $io->success('¡Este comando ha terminado con éxito!');

        return 0;
    }
}
