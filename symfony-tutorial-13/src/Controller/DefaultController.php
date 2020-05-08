<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Event\SampleEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;
use App\EventSubscriber\SampleSubscriber;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $subscriber = new SampleSubscriber();
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber($subscriber);

        $event = new SampleEvent("Something to store into the event object.");
        //$this->get('event_dispatcher')->dispatch(SampleEvent::NAME, $event);
        $dispatcher->dispatch($event, SampleEvent::NAME);

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
