<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(Request $request)
    {
        $session = $request->getSession();

        $session->set('city', 'Nombre de la ciudad');
        $session->set('country_name', 'Nombre del país');
        $session->set('latitude', 0.123);
        $session->set('longitude', 0.123);

        $this->addFlash('danger', 'ERROR: No podemos modificar la contraseña porque no coinciden.');
        $this->addFlash('success', 'Datos guardados.');
        $this->addFlash('warning', 'Ha ocurrido algo alarmante.');

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/show-session-variables", name="show")
     */
    public function show(Request $request)
    {
        $detectedLatitude = $request->getSession()->get('latitude');

        return $this->render('default/show.html.twig', [
            'controller_name' => 'DefaultController',
            'detected_latitude' => $detectedLatitude,
        ]);
    }
}
