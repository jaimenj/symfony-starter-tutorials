<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        // Paralell processing
        $processes = array();
        $output = '';
        $counter = 0;
        for ($i = 0; $i < 40; ++$i) {
            $process = new Process(
                ['echo', $counter]
            );
            $counter++;
            $process->start();
            $processes[] = $process;
        }
        sleep(5);
        $timeout = 3;
        $sigint = 0;
        foreach ($processes as $process) {
            $process->stop($timeout, $sigint);
            $output .= 'Paralell process done! output: '.$process->getOutput().'<br>';
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'output' => $output,
        ]);
    }
}