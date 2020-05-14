<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;
use App\Service\ContactsInfoManager;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(Request $request, ContactsInfoManager $contactsInfoManager)
    {
        $contactForm = $this->createForm(ContactType::class);

        if ($request->isMethod('POST')) {
            $contactForm->handleRequest($request);

            var_dump($contactForm->getData());

            $name = $contactForm->getData()['name'];
            $message = $contactForm->getData()['message'];
            $contactsInfoManager->saveContactForm(
                $name,
                $message
            );
        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'contactForm' => $contactForm->createView(),
        ]);
    }
}
