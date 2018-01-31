<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Event;
use App\Entity\News;

class EventController extends Controller
{
    /**
     * @Route("/eventi", name="event")
     */
    public function index()
    {
        $events_new = $this->getDoctrine()
            ->getRepository(Event::class)
            ->getThisYearByDate();

        $events_old = $this->getDoctrine()
            ->getRepository(Event::class)
            ->getOldByDate();

        return $this->render('event/index.html.twig', array('new' => $events_new, 'old' => $events_old));
    }

    /**
    * @Route("/eventi/{slug}", name="event_show")
    */
    public function show($slug){
        
        $event = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findOneBy(['slug' => $slug]);

        return $this->render('event/show.html.twig', array('event' => $event));
    }
}
