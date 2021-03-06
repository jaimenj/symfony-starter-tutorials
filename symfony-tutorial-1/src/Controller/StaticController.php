<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Route("/static/", name="home_static")
     */
    public function home()
    {
        return $this->render('static/index.html.twig', [
            'controller_name' => 'StaticController/home',
        ]);
    }

    /**
     * @Route("/static/{pageUrl}", name="static_page")
     */
    public function staticPage($pageUrl)
    {
        return $this->render('static/'.$pageUrl.'.html.twig', [
            'controller_name' => 'StaticController/staticPage',
        ]);
    }

    /**
     * @Route("/{pageUrl}", name="static_page_other")
     */
    public function staticPageOther($pageUrl)
    {
        return $this->render('static/'.$pageUrl.'.html.twig', [
            'controller_name' => 'StaticController/staticPageOther',
        ]);
    }
}
