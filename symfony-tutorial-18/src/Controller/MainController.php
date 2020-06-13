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
        $process = new Process(
            ['/bin/ls', '-lah', '../'],
            null,
            ['ENV_VAR_NAME' => 'valueOfEnvironmentVariable']
        );

        /*$process->run();
        $process->disableOutput();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }*/

        try {
            $process->mustRun();

            $output = $process->getOutput();
            $output = str_replace(PHP_EOL, '<br>', $output);
        } catch (ProcessFailedException $exception) {
            $output = $exception->getMessage();
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'output' => $output,
        ]);
    }
}