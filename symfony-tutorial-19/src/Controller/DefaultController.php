<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Session $session, Request $request)
    {
        $languages = $this->getParameter('languages');
        //var_dump($languages); exit;

        return $this->redirectToRoute('my_default', [
            '_locale' => $request->getPreferredLanguage($languages),
        ]);
    }
}