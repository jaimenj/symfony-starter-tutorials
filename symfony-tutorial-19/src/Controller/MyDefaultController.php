<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class MyDefaultController extends AbstractController
{
    /**
     * @Route("/", name="my_default")
     */
    public function index(Request $request, TranslatorInterface $translator)
    {
        $locale = $request->getLocale();

        $translated = $translator->trans('Texto a traducir');

        return $this->render('my_default/index.html.twig', [
            'locale' => $locale,
            'translated' => $translated,
        ]);
    }
}