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
        for ($i = 0; $i < 7; ++$i) {
            $process = new Process(
                ['stress','--cpu', '1', '--timeout', '30']
            );
            $counter++;
            $process->start();
            $processes[] = $process;

            $output .= 'Lanzado el proceso '.$counter.'<br>';
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'output' => $output,
        ]);
    }
}
