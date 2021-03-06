<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyIndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return new Response(
            '<html><body>¡Hola mundo Symfony 5!</body></html>'
        );
    }
}