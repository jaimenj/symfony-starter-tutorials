<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/{_locale}")
 */
class MyDefaultController extends AbstractController
{
    /**
     * @Route("/", name="my_default")
     */
    public function index(Request $request, TranslatorInterface $translator)
    {
        $locale = $request->getLocale();

        $translated = $translator->trans('Text to translate');

        return $this->render('my_default/index.html.twig', [
            'locale' => $locale,
            'translated' => $translated,
        ]);
    }

    /**
     * @Route("/{urlKey}", name="page_show_content")
     */
    public function showPageContent(Request $request, $urlKey) {
        $locale = $request->getLocale();
        $entityManager = $this->getDoctrine()->getManager();
        $page = $entityManager->getRepository('App\Entity\Page')->findOneBy([
            'urlKey' => $urlKey,
            'locale' => $locale,
        ]);

        var_dump($page);

        return $this->render('page/showContent.html.twig', [
            'page' => $page,
        ]);
    }
}