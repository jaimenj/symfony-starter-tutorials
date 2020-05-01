<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $arrayMenu = array(
            'page1', 'page2', 'page3',
        );

        return $this->render('main/index.html.twig', [
            'arrayMenu' => $arrayMenu,
        ]);
    }

    /**
     * @Route("/page1", name="page1")
     */
    public function page1()
    {
        $arrayMenu = array(
            'page1', 'page2', 'page3',
        );

        return $this->render('main/page1.html.twig', [
            'arrayMenu' => $arrayMenu,
        ]);
    }

    /**
     * @Route("/page2", name="page2")
     */
    public function page2()
    {
        $arrayMenu = array(
            'page1', 'page2', 'page3',
        );

        return $this->render('main/page2.html.twig', [
            'arrayMenu' => $arrayMenu,
        ]);
    }

    /**
     * @Route("/page3", name="page3")
     */
    public function page3()
    {
        $arrayMenu = array(
            'page1', 'page2', 'page3',
        );

        return $this->render('main/page3.html.twig', [
            'arrayMenu' => $arrayMenu,
        ]);
    }

    /**
     * @Route("/render-header", name="renderHeader")
     */
    public function renderHeader()
    {
        $arrayMenu = array(
            'page1', 'page2', 'page3',
        );
        
        return $this->render('menuheader.html.twig', [
            'arrayMenu' => $arrayMenu,
        ]);
    }
}
